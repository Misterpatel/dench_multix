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
                            <h1 class="page-title">{{$page_title}} </h1>

                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$page_title}}</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h3 class="card-title">Add Portfolio</h3>
                                        <a href="{{route('portfolio')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="portfolio_form" id="portfolio_form" name="portfolio_form"
                                            novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($portfolioData) ? $portfolioData->id : '' }}">

                                            <!-- Name -->
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $portfolioData->name ?? '' }}"
                                                    placeholder="Enter portfolio name" />
                                            </div>

                                            <!-- Short Content -->
                                            <div class="mb-3">
                                                <label for="short_content" class="form-label">Short Content</label>
                                                <textarea class="form-control" id="short_content" name="short_content"
                                                    placeholder="Enter short content">{{ $portfolioData->short_content ?? '' }}</textarea>
                                            </div>

                                            <!-- Content -->
                                            <div class="mb-3">
                                                <label for="content" class="form-label">Content</label>
                                                <textarea class="form-control" id="content" name="content"
                                                    placeholder="Enter detailed content">{{ $portfolioData->content ?? '' }}</textarea>
                                            </div>

                                            <!-- Client Name -->
                                            <div class="mb-3">
                                                <label for="client_name" class="form-label">Client Name</label>
                                                <input type="text" class="form-control" id="client_name"
                                                    name="client_name" value="{{ $portfolioData->client_name ?? '' }}"
                                                    placeholder="Enter client name" />
                                            </div>

                                            <!-- Client Company -->
                                            <div class="mb-3">
                                                <label for="client_company" class="form-label">Client Company</label>
                                                <input type="text" class="form-control" id="client_company"
                                                    name="client_company"
                                                    value="{{ $portfolioData->client_company ?? '' }}"
                                                    placeholder="Enter client company" />
                                            </div>

                                            <!-- Start Date -->
                                            <div class="mb-3">
                                                <label for="start_date" class="form-label">Start Date</label>
                                                <input type="date" class="form-control" id="start_date"
                                                    name="start_date" value="{{ $portfolioData->start_date ?? '' }}" />
                                            </div>

                                            <!-- End Date -->
                                            <div class="mb-3">
                                                <label for="end_date" class="form-label">End Date</label>
                                                <input type="date" class="form-control" id="end_date" name="end_date"
                                                    value="{{ $portfolioData->end_date ?? '' }}" />
                                            </div>

                                            <!-- Website -->
                                            <div class="mb-3">
                                                <label for="website" class="form-label">Website</label>
                                                <input type="url" class="form-control" id="website" name="website"
                                                    value="{{ $portfolioData->website ?? '' }}"
                                                    placeholder="Enter website URL" />
                                            </div>

                                            <!-- Cost -->
                                            <div class="mb-3">
                                                <label for="cost" class="form-label">Cost</label>
                                                <input type="text" class="form-control" id="cost" name="cost"
                                                    value="{{ $portfolioData->cost ?? '' }}"
                                                    placeholder="Enter project cost" />
                                            </div>

                                            <!-- Client Comment -->
                                            <div class="mb-3">
                                                <label for="client_comment" class="form-label">Client Comment</label>
                                                <textarea class="form-control" id="client_comment" name="client_comment"
                                                    placeholder="Enter client comment">{{ $portfolioData->client_comment ?? '' }}</textarea>
                                            </div>

                                            <!-- Select Category -->
                                            <div class="mb-3">
                                                <label for="category_id" class="form-label">Select Category</label>
                                                <select class="form-select select2" id="category_id" name="category_id">
                                                    <option value="">Select</option>
                                                    @foreach($category as $row)
                                                    <option value="{{ $row->id }}"
                                                        {{ !empty($portfolioData) && is_object($portfolioData) && $portfolioData->category_id == $row->id ? 'selected' : '' }}>
                                                        {{ $row->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Featured Photo -->
                                            <div class="mb-3">
                                                <label for="photo" class="form-label">Featured Photo</label>
                                                <input type="file" class="form-control" id="photo" name="photo" />
                                                @if (!empty($portfolioData->photo))
                                                <img src="{{ asset('storage/files/portfolio/' . $portfolioData->photo) }}"
                                                    alt="Banner" class="mt-2 img-thumbnail" width="100">
                                                @endif
                                            </div>

                                            <div class="row">
                                            <div class="row mb-3" id="other-photo-container">
                                                <div class="col-md-10">
                                                    <label for="other_photo" class="form-label">Other Photos</label>
                                                    <input type="file" class="form-control" id="other_photo"
                                                        name="other_photo[]" />
                                                </div>
                                                <div class="col-md-2 d-flex align-items-end">
                                                    <button type="button" class="btn btn-primary"
                                                        id="add-photo-btn" style="margin-bottom: 11px;">+</button>
                                                </div>
                                            </div>
                                          

                                            </div>
                                        <div class="row">
                                        @if (!empty($portfolioPhotoData))
                                                <div class="row mb-3">
                                                    @foreach ($portfolioPhotoData as $photo)
                                                        <div class="col-md-3 text-center" id="photo-{{ $photo->id }}">
                                                            <img src="{{ asset('storage/files/portfolio/other_photos/' . $photo->other_photo) }}"
                                                                alt="Other Photo" class="img-thumbnail mb-2" width="100"> <br>
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteOtherPhoto({{ $photo->id }})">
                                                                <i class="fe fe-trash"></i>
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                            <!-- Meta Title -->
                                            <div class="mb-3">
                                                <label for="meta_title" class="form-label">Meta Title</label>
                                                <input type="text" class="form-control" id="meta_title"
                                                    name="meta_title" value="{{ $portfolioData->meta_title ?? '' }}"
                                                    placeholder="Enter meta title" />
                                            </div>

                                            <!-- Meta Keyword -->
                                            <div class="mb-3">
                                                <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                                <textarea class="form-control" id="meta_keyword" name="meta_keyword"
                                                    placeholder="Enter meta keywords">{{ $portfolioData->meta_keyword ?? '' }}</textarea>
                                            </div>


                                            <!-- Meta Description -->
                                            <div class="mb-3">
                                                <label for="meta_description" class="form-label">Meta
                                                    Description</label>
                                                <textarea class="form-control" id="meta_description"
                                                    name="meta_description"
                                                    placeholder="Enter meta description">{{ $portfolioData->meta_description ?? '' }}</textarea>
                                            </div>


                                            <!-- Submit and Cancel Buttons -->
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="portfolio_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('portfolio') }}"
                                                    class="btn btn-secondary">Cancel</a>
                                            </div>
                                        </form>


                                    </div>
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
    <script src="{{ asset('/public/pages/portfolio.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>
    <script>
        document.getElementById('add-photo-btn').addEventListener('click', function () {
            // Create a new row
            const newRow = document.createElement('div');
            newRow.classList.add('row', 'mb-3');

            // Create the input column
            const inputCol = document.createElement('div');
            inputCol.classList.add('col-md-10');
            inputCol.innerHTML = `
            <input type="file" class="form-control" name="other_photo[]" />
        `;

            // Create the remove button column
            const btnCol = document.createElement('div');
            btnCol.classList.add('col-md-2', 'd-flex', 'align-items-end');
            btnCol.innerHTML = `
            <button type="button" class="btn btn-danger remove-photo-btn" style="margin-bottom: 11px;">-</button>
        `;

            // Append the columns to the new row
            newRow.appendChild(inputCol);
            newRow.appendChild(btnCol);

            // Append the new row to the container
            document.getElementById('other-photo-container').parentNode.appendChild(newRow);

            // Add an event listener for the remove button
            btnCol.querySelector('.remove-photo-btn').addEventListener('click', function () {
                newRow.remove();
            });
        });

    </script>
</body>
