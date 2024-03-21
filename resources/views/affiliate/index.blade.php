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
                                <th class="px-6 py-3" scope="col">
                                    {{ __('Actions') }}
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
                                        {{ $affiliate->verified ? 'Verified' : 'Pending' }}
                                    </td>
                                    <td class="w-56 px-0 py-4">
                                        <form class="inline-block" method="POST" action="{{ route('affiliate.verify', $affiliate) }}">
                                            @csrf
                                            @method('PUT')
                                            <button
                                                class="inline-flex items-center rounded-md border border-green-300 bg-green-500 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-900 shadow-sm transition duration-150 ease-in-out hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-25"
                                                type="submit" @disabled($affiliate->verified) onclick="return confirm('Are you sure?')">
                                                <svg class="mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                                                </svg>
                                                {{ $affiliate->verified ? 'Verified' : 'Verify' }}
                                            </button>
                                        </form>
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
