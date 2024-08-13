<x-layout>
    <h1 class="mb-4">Please verify your email through the email we have sent you!</h1>
    <p>Didn't get the email?</p>
    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Send Again</button>
    </form>
</x-layout>
