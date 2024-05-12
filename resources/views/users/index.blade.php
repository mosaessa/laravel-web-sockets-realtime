@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ol id="users">

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // console.log(window.axios)
        window.axios
            .get("/api/users")
            .then((res) => {
                const usersElement = document.getElementById("users");
                let users = res.data;
                users.forEach((user) => {
                    let element = document.createElement("li");
                    element.setAttribute("id", user.id);
                    element.innerText = user.name;
                    usersElement.appendChild(element);
                });
            })
            .catch((e) => console.log(e));

        Echo.private("users")

            .listen("UserUpdated", (e) => {
                console.log("UserUpdated");
                const element = document.getElementById(e.user.id);
                element.innerText = e.user.name;
            })
            .listen("UserCreated", (e) => {
                console.log("UserCreated");
                const usersElement = document.getElementById("users");
                let element = document.createElement("li");
                element.setAttribute("id", e.user.id);
                element.innerText = e.user.name;
                usersElement.appendChild(element);
            })
            .listen("UserDeleted", (e) => {
                console.log("UserDeleted");
                const element = document.getElementById(e.user.id);
                element.parentNode.removeChild(element);
            });
    </script>
@endpush
