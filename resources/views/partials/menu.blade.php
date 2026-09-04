<div class="max-w-6xl mx-auto flex justify-between items-center p-4">
    <h1 class="text-2xl font-bold text-indigo-600"><a href="{{ route('home.index') }}">LailsonDev</a></h1>
    <nav class="flex items-center space-x-6">
        <a href="{{ route('home.index') }}" class="hover:text-indigo-600">Início</a>
        <a href="{{ route('courses.index') }}" class="hover:text-indigo-600">Meus Cursos</a>
        <a href="{{ route('contact.index') }}" class="hover:text-indigo-600">Contato</a>
        <x-link-login-logout />
    </nav>
</div>
