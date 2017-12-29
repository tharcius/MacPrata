<?php

namespace MacPrata\Http\Controllers;

use Illuminate\Http\Request;

use MacPrata\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use MacPrata\Http\Requests\PersonCreateRequest;
use MacPrata\Http\Requests\PersonUpdateRequest;
use MacPrata\Repositories\PersonRepository;
use MacPrata\Validators\PersonValidator;


class PeopleController extends Controller
{

    /**
     * @var PersonRepository
     */
    protected $repository;

    /**
     * @var PersonValidator
     */
    protected $validator;

    public function __construct(PersonRepository $repository, PersonValidator $validator)
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
        $people = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $people,
            ]);
        }

        return view('people.index', compact('people'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PersonCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PersonCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $person = $this->repository->create($request->all());

            $response = [
                'message' => 'Person created.',
                'data'    => $person->toArray(),
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
        $person = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $person,
            ]);
        }

        return view('people.show', compact('person'));
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

        $person = $this->repository->find($id);

        return view('people.edit', compact('person'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PersonUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PersonUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $person = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Person updated.',
                'data'    => $person->toArray(),
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
                'message' => 'Person deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Person deleted.');
    }
}
