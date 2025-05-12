<section>
    <header>
        <h2 class="text-lg font-semibold text-blue-800">
            Informasi Profil
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Perbarui informasi profil dan alamat email akun Anda.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Nama Lengkap" class="text-blue-700" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full border-blue-300 focus:border-blue-500 focus:ring-blue-500"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Email" class="text-blue-700" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full border-blue-300 focus:border-blue-500 focus:ring-blue-500"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        Alamat email Anda belum diverifikasi.

                        <button
                            form="send-verification"
                            class="underline text-sm text-blue-600 hover:text-blue-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Klik di sini untuk mengirim ulang email verifikasi.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            Tautan verifikasi baru telah dikirim ke alamat email Anda.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="no_hp" value="Nomor HP" class="text-blue-700" />
            <x-text-input
                id="no_hp"
                name="no_hp"
                type="text"
                class="mt-1 block w-full border-blue-300 focus:border-blue-500 focus:ring-blue-500"
                :value="old('no_hp', $user->no_hp)"
            />
            <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
        </div>

        <div>
            <x-input-label for="alamat" value="Alamat" class="text-blue-700" />
            <textarea
                id="alamat"
                name="alamat"
                class="mt-1 block w-full border-blue-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm px-3 py-2"
                rows="3"
            >{{ old('alamat', $user->alamat ?? '') }}</textarea>
            <x-input-error class="mt-2 mr-2" :messages="$errors->get('alamat')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-blue-600 hover:bg-blue-700 focus:ring-blue-500">
                Simpan
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >
                    Data berhasil diperbarui.
                </p>
            @endif
        </div>
    </form>
</section>
