<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-gray-800">
            {{ __('Affiliates') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto p-6 shadow-md sm:rounded-lg">
                    <table class="w-full text-left text-sm text-gray-500">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                            <tr>
                                <th class="px-6 py-3" scope="col">
                                    {{ __('Name') }}
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    {{ __('Phone') }}
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    {{ __('Email') }}
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    {{ __('Location') }}
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    {{ __('Status') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($affiliates as $affiliate)
                                <tr class="border-b bg-white">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $affiliate->name }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $affiliate->phone }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $affiliate->email }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $affiliate->location }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $affiliate->verifed ? 'Approved' : 'Pending' }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b bg-white">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" colspan="2">
                                        {{ __('No Affiliates Found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="px-6 py-4">
                        {{ $affiliates->appends(request()->query())->links('components.paginator') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
