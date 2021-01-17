@extends('site.layouts.app')
@section('content')
    <section class="w-100 p-top-50 p-bottom-50">
        <div class="center container">
            <div class="w-100 d_flex justify-center">
                @if(!$contacts->isEmpty())
                    <table class="w-100">
                        <thead>
                        <tr>
                            <td>
                                Nome
                            </td>
                            <td>
                                E-mail
                            </td>
                            <td>
                                Telefone
                            </td>
                            <td>
                                Data
                            </td>
                            <td>
                                Arquivo
                            </td>
                            <td>
                                Mensagem
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($contacts as $contact)
                            <tr>
                                <td>
                                    {{ $contact->name }}
                                </td>
                                <td>
                                    {{ $contact->email }}
                                </td>
                                <td>
                                    {{ $contact->phone }}
                                </td>
                                <td>
                                    {{ date_format($contact->created_at, 'd/m/Y H:i:s') }}
                                </td>
                                <td>
                                    <a href="{{ asset('uploads/'.$contact->file) }}" target="_blank">
                                        Ver arquivo
                                    </a>
                                </td>
                                <td>
                                    {{ $contact->message }}
                                </td>
                            </tr>
                    @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="w-100 alert alert-danger t-align-c">
                        Nenhum contato encontrado
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
