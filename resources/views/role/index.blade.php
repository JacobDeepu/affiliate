<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-gray-800">
            {{ __('Roles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                <div class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label class="sr-only" for="simple-search">Search</label>
                            <div class="relative w-full">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-500" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input class="focus:border-primary-500 focus:ring-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900"
                                    id="simple-search" type="text" placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                    <div class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0">
                        @can('create a role')
                            <x-link class="bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 text-white" href="{{ route('role.create') }}">
                                <svg class="mr-2 h-3.5 w-3.5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Create role
                            </x-link>
                        @endcan
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                            <tr>
                                <th class="px-4 py-3" scope="col">Role name</th>
                                @canany(['edit a role', 'delete a role'])
                                    <th class="px-4 py-3" scope="col">Actions</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr class="border-b">
                                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900" scope="row">{{ $role->name }}</th>
                                    @can('edit a role')
                                        <td class="flex items-center px-4 py-3">
                                            <x-link class="border-primary-700 text-primary-700 hover:text-primary-800 border" href="{{ route('role.edit', $role) }}">
                                                <svg class="feather feather-check-square mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                                </svg> Edit
                                            </x-link>
                                        @endcan
                                        @can('delete a role')
                                            <form class="inline-block px-2" method="POST" action="{{ route('role.destroy', $role) }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type="submit" onclick="return confirm('Are you sure?')">
                                                    <svg class="feather feather-trash-2 mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg> Delete
                                                </x-danger-button>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @empty
                                <tr class="border-b bg-white">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" colspan="2">
                                        {{ __('No roles Found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $roles->appends(request()->query())->links('components.paginator') }}
            </div>
        </div>
    </div>
</x-app-layout>
