@extends('layouts.default')

@section('content')
@include('elements.top-css')

<body class="app sidebar-mini ltr light-mode">
    <div class="page">
        <div class="page-main">
            @include('elements.header')
            @include('elements.sidebar')

            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <div class="main-container container-fluid">
                        <div class="page-header">
                            <h1 class="page-title">User Permissions</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">User Permissions</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">User Permissions</h3>
                                    </div>
                                    <div class="card-body">
    <input type="hidden" name="user_id" id="user_id" value="{{ $userId }}">
<form id="permissionForm" class="p-4 border rounded shadow-sm bg-light">
    <input type="hidden" name="user_id" value="{{ $userId }}">
    
    <div class="form-group">
        @php
        function renderMenu($menus, $parentId = null, $level = 0, &$serial, $userId) {
            foreach ($menus as $menu) {
                if ($menu->parent_id == $parentId) {
                    $checked = DB::table('user_permissions')
                        ->where('user_id', $userId)
                        ->where('menu_id', $menu->id)
                        ->exists();
        @endphp
                    <div class="menu-item d-flex align-items-center mb-2" style="margin-left: {{ $level * 20 }}px;">
                        <input type="checkbox" name="permissions[]" value="{{ $menu->id }}" class="mr-2" {{ $checked ? 'checked' : '' }}>
                        <label class="mb-0">{{ $menu->name }}</label>
                    </div>
        @php
                    renderMenu($menus, $menu->id, $level + 1, $serial, $userId);
                }
            }
        }
        $serial = 1;
        renderMenu($menuData, null, 0, $serial, $userId);
        @endphp
    </div>
    
    <button type="submit" class="btn btn-primary mt-3 w-100">Save Permissions</button>
</form>
</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('elements.sidebar-right')
        @include('elements.footer')
    </div>

    @include('elements.bottom-js')

    <script src="{{ asset('/public/pages/permission.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>


</body>
@endsection
