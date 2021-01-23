<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Jobs\contact;
use App\Validators\ContactValidator;
use App\Repositories\ContactRepository;
use App\Mail\Site\Contact\ContactClientMail;
use App\Mail\Site\Contact\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ContactController extends Controller
{

    protected $repository;
    protected $validator;
    protected $path;

    public function __construct(ContactRepository $repository,
                                ContactValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->path = 'uploads/';
    }

    public function index(Request $request)
    {
        return view('site.contact.index');
    }

    public function store(Request $request)
    {

        try {
            $data = $request->all();

            $data['ip'] = $request->ip();
            //aux file validate
            if(isset($data['file'])){
                $data['validFile'] = $data['file'];
            }else{
                $error[] = 'Arquivo é Obrigatório';
                return response()->json([
                    'status' => 422,
                    'message' => $error
                ]);
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            if (isset($data['file'])) {
                $file = $this->uploadFile($request, $data, $this->path, 'file');
                if ($file) {
                    $data['file'] = $file;
                }
            }
            $data['validFile'] = '';
            $contactCreated = $this->repository->create($data);

            //getContactForTest
            $contact = $this->repository->find($contactCreated->id);

            $this->sendMail($contact);

            $msgSucess = 'Contato enviado com sucesso! <a href="'.route('contact.show').'" title="Clique aqui para ver todos os contatos">Clique aqui para ver todos os contatos</a>';

            return response()->json([
                'id' => $contact->id,
                'contact' => $contact,
                'status' => 200,
                'message' => $msgSucess
            ]);

        } catch (ValidatorException $e) {
            return response()->json([
                'status' => 422,
                'message' => $e->getMessageBag()
            ]);
        }
    }

    private function sendMail($contact){
        contact::dispatch($contact)->delay(now()->addSeconds('15'));
    }

    private function uploadFile($request, $data, $path, $file)
    {
        if (isset($data[$file])) {

            $fileName = md5(time() . rand(1, 8)) . '.' . $data[$file]->getClientOriginalExtension();
            $request->$file->move(public_path($path), $fileName);
            $data[$file] = $fileName;

            return $data[$file];
        }

        return false;
    }

    public function show(){
        //$contacts = $this->repository->orderBy('created_at', 'desc')->skip(0)->take(0)->get();
        $contacts = $this->repository->orderBy('created_at', 'desc')->get();

        return view('site.contact.show', compact('contacts'));

    }

}
