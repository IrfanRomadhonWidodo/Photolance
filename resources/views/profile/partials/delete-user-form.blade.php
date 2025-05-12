<section class="space-y-6">
    <header>
        <h2 class="text-lg font-semibold text-red-700">
            Hapus Akun
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Setelah akun Anda dihapus, semua data dan sumber daya akan dihapus secara permanen. Sebelum melanjutkan, pastikan Anda telah mengunduh data yang ingin disimpan.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 focus:ring-red-500"
    >
        Hapus Akun
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-gray-900">
                Apakah Anda yakin ingin menghapus akun?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Setelah akun Anda dihapus, semua data dan sumber daya akan dihapus secara permanen. Masukkan kata sandi Anda untuk mengonfirmasi penghapusan akun secara permanen.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Kata Sandi" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full sm:w-3/4"
                    placeholder="Kata Sandi"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Batal
                </x-secondary-button>

                <x-danger-button class="ms-3 bg-red-600 hover:bg-red-700 focus:ring-red-500">
                    Hapus Akun
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
