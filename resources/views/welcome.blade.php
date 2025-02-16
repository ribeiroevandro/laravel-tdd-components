<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles / Scripts -->
        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="font-sans antialiased flex items-center justify-center min-h-screen bg-gray-200 bg-pattern" x-data="welcome">
        <div class="flex flex-col container gap-10 bg-">
            <x-ui.alert type="success">
                This is a success message
            </x-ui.alert>
            <x-ui.alert type="error">
                This is a error message
            </x-ui.alert>
            <x-ui.alert type="warning">
                This is a warning message
            </x-ui.alert>
            <x-ui.alert type="info">
                This is a info message
            </x-ui.alert>

            <form action="{{ route('contact.store') }}" method="POST" class="w-full max-w-lg" novalidate>
                @csrf
                <x-form.input
                    name="email"
                    type="email"
                    label="Email Address"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    required
                />
                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Submit
                </button>
            </form>

            <div class="flex flex-col gap-4">
                <button
                    @click="openModal('example')"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                >
                    Abrir Modal com Evento
                </button>
                <x-ui.modal
                    x-on:example-modal.window="showModal = !showModal;"
                    x-show="showModal"
                    @click.outside="showModal = false"
                    max-width="2xl"
                    title="Teste"
                >
                    porra
                </x-ui.modal>
            </div>
        </div>
        <script>
            const welcome = () => {
                return {
                    showModal: false,
                    openModal(integration) {
                        handleModal(`${integration}-modal`, null);
                    },
                }
            }
        </script>

    </body>
</html>
