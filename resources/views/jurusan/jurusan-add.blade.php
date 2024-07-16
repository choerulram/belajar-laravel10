@extends('layouts.sidebar')
@section('title', 'Data Mahasiswa')

@section('content')
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="box-shadow: 4px 8px 12px rgba(168, 85, 247, 0.5);">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Data Jurusan
                    </h3>
                </div>
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="jurusan" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="kode_jur"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode</label>
                            <input type="text" name="kode_jur" id="kode_jur"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Tuliskan kode jurusan" autocomplete="off" required>
                        </div>
                        <div class="mb-4">
                            <label for="nama_jur"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Jurusan</label>
                            <input type="text" name="nama_jur" id="nama_jur" placeholder="Tuliskan nama jurusan..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                autocomplete="off" required>
                        </div>
                        <button type="button"
                            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 mb-2"><a
                                href="/jurusan">Kembali</a></button>
                        <button type="submit"
                            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 mb-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    @endsection
