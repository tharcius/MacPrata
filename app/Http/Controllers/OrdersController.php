<?php

namespace MacPrata\Http\Controllers;
use Illuminate\Http\Request;
use MacPrata\Repositories\EquipmentRepository;
use MacPrata\Repositories\PersonRepository;
use MacPrata\Repositories\ProductRepository;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use MacPrata\Repositories\OrderRepository;
use MacPrata\Validators\OrderValidator;


class OrdersController extends Controller
{

    /**
     * @var OrderRepository
     */
    protected $repository;

    /**
     * @var OrderValidator
     */
    protected $validator;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var PersonRepository
     */
    private $personRepository;
    /**
     * @var EquipmentRepository
     */
    private $equipmentRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(OrderRepository $repository, OrderValidator $validator, Request $request, PersonRepository $personRepository, EquipmentRepository $equipmentRepository, ProductRepository $productRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->request = $request;
        $this->personRepository = $personRepository;
        $this->equipmentRepository = $equipmentRepository;
        $this->productRepository = $productRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $orders = $this->repository->all();
        return view('orders.index', compact('orders', 'products'));
    }

    public function create()
    {
        $people = $this->personRepository->pluck('name','id');
        $equipments = $this->equipmentRepository->pluck('name','id');
        $products = $this->productRepository->all();
        return view('orders.create', ['equipments'=>$equipments, 'people'=>$people, 'products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OrderCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try {
            $this->validator->with($this->request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dataOrder=$this->request->all();
            $dataOrder['total'] = $dataOrder['d']['product']['value']*$dataOrder['d']['product']['amount'];
            $dataOrder['date'] = date("d-m-Y", strtotime($dataOrder['date']));
            unset($dataOrder['d']);
            $order = $this->repository->create($dataOrder);
            $response = [
                'message' => 'Ordem de Serviço criado com sucesso.',
                'data' => $order->toArray(),
            ];
            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($this->request->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->repository->find($id);
        if (request()->wantsJson()) {
            return response()->json([
                'data' => $order,
            ]);
        }
        return view('orders.show', compact('order'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->repository->find($id);
        $people = $this->personRepository->pluck('name','id');
        $equipments = $this->equipmentRepository->pluck('name','id');
        $products = $this->productRepository->all();
        return view('orders.edit', ['order'=>$order, 'equipments'=>$equipments, 'people'=>$people, 'products'=>$products]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  OrderUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update($id)
    {
        try {
            $this->validator->with($this->request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dataOrder=$this->request->all();
            $dataOrder['total'] = $dataOrder['d']['product']['value']*$dataOrder['d']['product']['amount'];
            $dataOrder['date'] = date("d-m-Y", strtotime($dataOrder['date']));
            unset($dataOrder['d']);
//            dd($dataOrder);
            $order = $this->repository->update($dataOrder, $id);
            $response = [
                'message' => 'Ordem de Serviço atualizada.',
                'data' => $order->toArray(),
            ];
            if ($this->request->wantsJson()) {
                return response()->json($response);
            }
            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($this->request->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        if (request()->wantsJson()) {
            return response()->json([
                'message' => 'Order deleted.',
                'deleted' => $deleted,
            ]);
        }
        return redirect()->back()->with('message', 'Order deleted.');
    }
}
