<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MacPrata\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use MacPrata\Http\Requests\EquipmentCreateRequest;
use MacPrata\Http\Requests\EquipmentUpdateRequest;
use App\Repositories\EquipmentRepository;
use App\Validators\EquipmentValidator;


class EquipmentController extends Controller
{

    /**
     * @var EquipmentRepository
     */
    protected $repository;

    /**
     * @var EquipmentValidator
     */
    protected $validator;

    public function __construct(EquipmentRepository $repository, EquipmentValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $equipment = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $equipment,
            ]);
        }

        return view('equipment.index', compact('equipment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EquipmentCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $equipment = $this->repository->create($request->all());

            $response = [
                'message' => 'Equipment created.',
                'data'    => $equipment->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
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
        $equipment = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $equipment,
            ]);
        }

        return view('equipment.show', compact('equipment'));
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

        $equipment = $this->repository->find($id);

        return view('equipment.edit', compact('equipment'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EquipmentUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(EquipmentUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $equipment = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Equipment updated.',
                'data'    => $equipment->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
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
                'message' => 'Equipment deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Equipment deleted.');
    }
}
