@extends('layouts.admin')
@section('title', __('main.roles'))

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 mx-auto">
        <div>
            {{-- header --}}
            <div class="flex justify-between mb-8">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">{{ __('main.roles') }}</h2>
                </div>
                @can('roles-create')
                    <button
                        class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                        data-hs-overlay="#create-role">
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            fill="none">
                            <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                        {{ __('main.add_new_role') }}
                    </button>
                @endcan
            </div>
            {{-- end header --}}
            @foreach ($roles as $role)
                {{-- create role --}}
                @can('roles-create')
                    <div id="create-role"
                        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                        <div
                            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                            <div
                                class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                                <div class="absolute top-2 right-2">
                                    <button type="button"
                                        class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                                        data-hs-overlay="#create-role">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                                fill="currentColor" />
                                        </svg>
                                    </button>
                                </div>
                                <form action="{{ route('admin.roles.store') }}" method="POST">
                                    @csrf
                                    <div class="p-4 sm:p-10 overflow-y-auto">
                                        <div class="mb-6 text-center">
                                            <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                                                {{ __('main.add_new_role') }}
                                            </h3>
                                        </div>

                                        <div class="space-y-4">
                                            <div>
                                                <label for="name" class="block text-sm mb-2 dark:text-white">{{ __('main.name') }}</label>
                                                <div class="relative">
                                                    <input type="text" id="name" name="name"
                                                        value="{{ old('name') }}"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                        required maxlength="190">
                                                </div>
                                                @error('name')
                                                    <p class="hidden text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="display_name" class="block text-sm mb-2 dark:text-white">{{ __('main.show_name') }}</label>
                                                <div class="relative">
                                                    <input type="text" id="display_name" name="display_name"
                                                        value="{{ old('display_name') }}"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                        required maxlength="190">
                                                </div>
                                                @error('display_name')
                                                    <p class="hidden text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="description" class="block text-sm mb-2 dark:text-white">{{ __('main.description') }}</label>
                                                <div class="relative">
                                                    <textarea id="description" name="description" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" rows="3">{{ old('description') }}</textarea>
                                                </div>
                                                @error('description')
                                                    <p class="hidden text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                <thead class="mb-3">
                                                    <tr>
                                                        <th class="px-4 py-3 text-start rtl:text-right text-xs font-medium text-gray-500 uppercase">
                                                            {{ __('main.permission') }}
                                                        </th>
                                                        <th class="px-4 py-3 text-start rtl:text-right text-xs font-medium text-gray-500 uppercase">
                                                            {{ __('main.creaet') }}
                                                        </th>
                                                        <th class="px-4 py-3 text-start rtl:text-right text-xs font-medium text-gray-500 uppercase">
                                                            {{ __('main.read') }}
                                                        </th>
                                                        <th class="px-4 py-3 text-start rtl:text-right text-xs font-medium text-gray-500 uppercase">
                                                            {{ __('main.update') }}
                                                        </th>
                                                        <th class="px-4 py-3 text-start rtl:text-right text-xs font-medium text-gray-500 uppercase">
                                                            {{ __('main.delete') }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                    @php
                                                        $permissions = \Spatie\Permission\Models\Permission::groupBy('table')->get();
                                                    @endphp
                                                    @foreach ($permissions as $permission)
                                                        @php
                                                            $sub_permissions = \Spatie\Permission\Models\Permission::where('table', $permission->table)->get();
                                                        @endphp
                                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                {{ $permission->table }}</td>
                                                            @if ($sub_permissions->where('name', $permission->table . '-create')->first())
                                                                <td>
                                                                    <div class="form-check form-switch">
                                                                        <input
                                                                            class="relative shrink-0 w-11 h-6 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-5 before:h-5 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                                                            type="checkbox"
                                                                            id="{{ $permission->table . '-create' }}"
                                                                            value="{{ $permission->table . '-create' }}"
                                                                            @if (isset($role) && $role->hasPermissionTo($permission->table . '-create')) checked @endif
                                                                            name="permissions[]">                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>
                                                                </td>
                                                            @endif
                                                            @if ($sub_permissions->where('name', $permission->table . '-read')->first())
                                                                <td>
                                                                    <div class="form-check form-switch">
                                                                        <input
                                                                            class="relative shrink-0 w-11 h-6 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-5 before:h-5 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                                                            type="checkbox"
                                                                            id="{{ $permission->table . '-read' }}"
                                                                            value="{{ $permission->table . '-read' }}"
                                                                            @if (isset($role) && $role->hasPermissionTo($permission->table . '-read')) checked @endif
                                                                            name="permissions[]">                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>
                                                                </td>
                                                            @endif
                                                            @if ($sub_permissions->where('name', $permission->table . '-update')->first())
                                                                <td>
                                                                    <div class="form-check form-switch">
                                                                        <input
                                                                            class="relative shrink-0 w-11 h-6 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-5 before:h-5 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                                                            type="checkbox"
                                                                            id="{{ $permission->table . '-update' }}"
                                                                            value="{{ $permission->table . '-update' }}"
                                                                            @if (isset($role) && $role->hasPermissionTo($permission->table . '-update')) checked @endif
                                                                            name="permissions[]">
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>
                                                                </td>
                                                            @endif
                                                            @if ($sub_permissions->where('name', $permission->table . '-delete')->first())
                                                                <td>
                                                                    <div class="form-check form-switch">
                                                                        <input
                                                                            class="relative shrink-0 w-11 h-6 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-5 before:h-5 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                                                            type="checkbox"
                                                                            id="{{ $permission->table . '-delete' }}"
                                                                            value="{{ $permission->table . '-delete' }}"
                                                                            @if (isset($role) && $role->hasPermissionTo($permission->table . '-delete')) checked @endif
                                                                            name="permissions[]">
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div
                                        class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                                        <button type="button"
                                            class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                                            data-hs-overlay="#create-role">
                                            {{ __('main.cancel') }}
                                        </button>
                                        <button type="submit"
                                            class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                            {{ __('main.create') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endcan
                {{-- end create role --}}
                {{-- update role --}}
                @can('roles-update')
                    <div id="edit-{{ $role->id }}"
                        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                        <div
                            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                            <div
                                class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                                <div class="absolute top-2 right-2">
                                    <button type="button"
                                        class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                                        data-hs-overlay="#edit-{{ $role->id }}">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                                fill="currentColor" />
                                        </svg>
                                    </button>
                                </div>
                                <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="p-4 sm:p-10 overflow-y-auto">
                                        <div class="mb-6 text-center">
                                            <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                                                {{ __('main.edit_role') }}
                                            </h3>
                                        </div>
                                        <div class="space-y-4">
                                            <div>
                                                <label for="name" class="block text-sm mb-2 dark:text-white">{{__('main.name')}}</label>
                                                <div class="relative">
                                                    <input type="text" id="name" name="name"
                                                        value="{{ old('name', $role ?? '') }}"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                        required maxlength="190">
                                                </div>
                                                @error('name')
                                                    <p class="hidden text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="display_name" class="block text-sm mb-2 dark:text-white">{{__('main.show_name')}}</label>
                                                <div class="relative">
                                                    <input type="text" id="display_name" name="display_name"
                                                        value="{{ old('display_name', $role ?? '') }}"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                        required maxlength="190">
                                                </div>
                                                @error('display_name')
                                                    <p class="hidden text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="description" class="block text-sm mb-2 dark:text-white">{{__('main.description')}}</label>
                                                <div class="relative">
                                                    <textarea id="description" name="description"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                        rows="3">{{ old('description', $role ?? '') }}</textarea>
                                                </div>
                                                @error('description')
                                                    <p class="hidden text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                <thead class="mb-3">
                                                    <tr>
                                                        <th class="px-4 py-3 text-start rtl:text-right text-xs font-medium text-gray-500 uppercase">
                                                            {{__('main.permission ')}}
                                                        </th>
                                                        <th class="px-4 py-3 text-start rtl:text-right text-xs font-medium text-gray-500 uppercase">
                                                            
                                                            {{__('main.create')}}</th>
                                                        <th class="px-4 py-3 text-start rtl:text-right text-xs font-medium text-gray-500 uppercase">
                                                            {{__('main.read')}}
                                                        </th>
                                                        <th class="px-4 py-3 text-start rtl:text-right text-xs font-medium text-gray-500 uppercase">
                                                            {{__('main.update')}}
                                                        </th>
                                                        <th class="px-4 py-3 text-start rtl:text-right text-xs font-medium text-gray-500 uppercase">
                                                            {{__('main.delete')}}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                    @php
                                                        $permissions = \Spatie\Permission\Models\Permission::groupBy('table')->get();
                                                    @endphp
                                                    @foreach ($permissions as $permission)
                                                        @php
                                                            $sub_permissions = \Spatie\Permission\Models\Permission::where('table', $permission->table)->get();
                                                        @endphp
                                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                {{ $permission->table }}</td>
                                                            @if ($sub_permissions->where('name', $permission->table . '-create')->first())
                                                                <td>
                                                                    <div class="form-check form-switch">
                                                                        <input
                                                                            class="relative shrink-0 w-11 h-6 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-5 before:h-5 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                                                            type="checkbox"
                                                                            id="{{ $permission->table . '-create' }}"
                                                                            value="{{ $permission->table . '-create' }}"
                                                                            @if (isset($role) && $role->hasPermissionTo($permission->table . '-create')) checked @endif
                                                                            name="permissions[]">
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>
                                                                </td>
                                                            @endif
                                                            @if ($sub_permissions->where('name', $permission->table . '-read')->first())
                                                                <td>
                                                                    <div class="form-check form-switch">
                                                                        <input
                                                                            class="relative shrink-0 w-11 h-6 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-5 before:h-5 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                                                            type="checkbox"
                                                                            id="{{ $permission->table . '-read' }}"
                                                                            value="{{ $permission->table . '-read' }}"
                                                                            @if (isset($role) && $role->hasPermissionTo($permission->table . '-read')) checked @endif
                                                                            name="permissions[]">
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>
                                                                </td>
                                                            @endif
                                                            @if ($sub_permissions->where('name', $permission->table . '-update')->first())
                                                                <td>
                                                                    <div class="form-check form-switch">
                                                                        <input
                                                                            class="relative shrink-0 w-11 h-6 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-5 before:h-5 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                                                            type="checkbox"
                                                                            id="{{ $permission->table . '-update' }}"
                                                                            value="{{ $permission->table . '-update' }}"
                                                                            @if (isset($role) && $role->hasPermissionTo($permission->table . '-update')) checked @endif
                                                                            name="permissions[]">
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>
                                                                </td>
                                                            @endif
                                                            @if ($sub_permissions->where('name', $permission->table . '-delete')->first())
                                                                <td>
                                                                    <div class="form-check form-switch">
                                                                        <input
                                                                            class="relative shrink-0 w-11 h-6 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-5 before:h-5 before:bg-white checked:before:bg-blue-200 before:trangray-x-0 checked:before:trangray-x-full rtl:checked:before:-trangray-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                                                            type="checkbox"
                                                                            id="{{ $permission->table . '-delete' }}"
                                                                            value="{{ $permission->table . '-delete' }}"
                                                                            @if (isset($role) && $role->hasPermissionTo($permission->table . '-delete')) checked @endif
                                                                            name="permissions[]">
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div
                                        class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                                        <button type="button" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" data-hs-overlay="#edit-{{ $role->id }}">
                                            {{__('main.cancel')}}
                                        </button>
                                        <button type="submit" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                            {{__('main.update')}}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endcan
                {{-- end update role --}}
                {{-- delete role --}}
                @can('roles-delete')
                    <div id="delete-alert-{{ $role->id }}"
                        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                        <div
                            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
                            <div
                                class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                                <div class="absolute top-2 right-2">
                                    <button type="button"
                                        class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                                        data-hs-overlay="#delete-alert-{{ $role->id }}">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                                fill="currentColor" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-4 sm:p-10 overflow-y-auto">
                                    <div class="flex gap-x-4 md:gap-x-7">
                                        <!-- Icon -->
                                        <span
                                            class="flex-shrink-0 inline-flex justify-center items-center w-[46px] h-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                            </svg>
                                        </span>
                                        <!-- End Icon -->

                                        <div class="grow">
                                            <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                                                {{__('main.confirmation')}}
                                            </h3>
                                            <p class="text-gray-500">
                                                {{__('main.are_you_sure_you_want_to_delete')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div
                                        class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                                        <button type="button" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" data-hs-overlay="#delete-alert-{{ $role->id }}">
                                            {{__('main.cancel')}}
                                        </button>
                                        <button type="submit" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                            {{__('main.delete')}}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endcan
                {{-- end delete role --}}
            @endforeach
        </div>
        <!-- table -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-gray-900 dark:border-gray-700">
                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-start">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            {{ __('main.id') }}
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            {{ __('main.role_name') }}
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            {{ __('main.actions') }}
                                        </span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="h-px px-6 py-3 whitespace-nowrap">
                                            <span class="block text-sm text-gray-500">{{ $role->id }}</span>
                                        </td>
                                        <td class="h-px px-6 py-3 whitespace-nowrap">
                                            <span class="block text-sm text-gray-500">{{ $role->name }}</span>
                                        </td>
                                        <td class="h-px px-6 py-3 whitespace-nowrap">
                                            <div>
                                                <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                                    <button id="hs-table-dropdown-{{ $role->id }}" type="button"
                                                        class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-md text-gray-700 align-middle focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                        </svg>
                                                    </button>
                                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[10rem] z-10 bg-white shadow-2xl rounded-xl p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700"
                                                        aria-labelledby="hs-table-dropdown-{{ $role->id }}">
                                                        @can('roles-update')
                                                            <div class="py-2 first:pt-0 last:pb-0">
                                                                <button class="flex items-center gap-x-3 w-full py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" data-hs-overlay="#edit-{{ $role->id }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                    </svg>
                                                                    {{ __('main.edit') }}
                                                                </button>
                                                            </div>
                                                        @endcan
                                                        @can('roles-delete')
                                                            <div class="py-2 first:pt-0 last:pb-0">
                                                                <button class="flex items-center gap-x-3 w-full py-2 px-3 rounded-md text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-gray-700" data-hs-overlay="#delete-alert-{{ $role->id }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                                    </svg>
                                                                    {{ __('main.delete') }}
                                                                </button>
                                                            </div>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end table -->
    </div>
@endsection
