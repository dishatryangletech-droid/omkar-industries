@extends('layouts.backend')

@section('title', 'Footer Settings')

@push('page-css')
    <style>
        .link-row {
            padding: 10px 0;
            margin-bottom: 8px;
            border-bottom: 1px solid #f1f0f2;
        }
        .link-row:last-child { border-bottom: none; }
    </style>
@endpush

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Global Footer & Contact Settings</h5>
                    <form action="#" method="POST">
                        @csrf
                        <div class="row">

                            <!-- Footer Links Section -->
                            <div class="col-lg-6 mt-4">
                                <h6 class="text-primary border-bottom pb-2 mb-3"><i class="ti ti-link me-2"></i>Quick Links</h6>
                                <div id="quick-links-container">
                                    @php $quickLinks = $settings->quick_links ?? []; @endphp
                                    @forelse($quickLinks as $link)
                                        <div class="link-row d-flex gap-2 align-items-center mb-3">
                                            <input type="text" name="quick_links[title][]" class="form-control" value="{{ $link['title'] ?? '' }}" placeholder="Title (e.g. Home)">
                                            <div class="input-group">
                                                <span class="input-group-text">{{ url('') }}</span>
                                                <input type="text" name="quick_links[url][]" class="form-control" value="{{ $link['url'] ?? '' }}" placeholder="/home">
                                            </div>
                                            <button type="button" class="btn p-0 border-0 bg-transparent text-danger remove-link"><i class="ti ti-trash fs-4"></i></button>
                                        </div>
                                    @empty
                                        @php
                                            $defaultQuickLinks = [
                                                ['title' => 'Home', 'url' => '/home'],
                                                ['title' => 'About Us', 'url' => '/about-us'],
                                                ['title' => 'Products', 'url' => '/products'],
                                                ['title' => 'Our Clients', 'url' => '/our-clients'],
                                                ['title' => 'Gallery', 'url' => '/gallery'],
                                                ['title' => 'News', 'url' => '/news'],
                                                ['title' => 'Contact Us', 'url' => '/contact-us'],
                                            ];
                                        @endphp
                                        @foreach($defaultQuickLinks as $link)
                                        <div class="link-row d-flex gap-2 align-items-center mb-3">
                                            <input type="text" name="quick_links[title][]" class="form-control" value="{{ $link['title'] }}" placeholder="Title (e.g. Home)">
                                            <div class="input-group">
                                                <span class="input-group-text">{{ url('') }}</span>
                                                <input type="text" name="quick_links[url][]" class="form-control" value="{{ $link['url'] }}" placeholder="/home">
                                            </div>
                                            <button type="button" class="btn p-0 border-0 bg-transparent text-danger remove-link"><i class="ti ti-trash fs-4"></i></button>
                                        </div>
                                        @endforeach
                                    @endforelse
                                </div>
                                <button type="button" class="btn btn-sm btn-label-primary mt-2 add-link" data-container="#quick-links-container" data-name="quick_links">
                                    <i class="ti ti-plus me-1"></i> Add Quick Link
                                </button>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <h6 class="text-primary border-bottom pb-2 mb-3"><i class="ti ti-link me-2"></i>Other Links</h6>
                                <div id="other-links-container">
                                    @php $otherLinks = $settings->other_links ?? []; @endphp
                                    @forelse($otherLinks as $link)
                                        <div class="link-row d-flex gap-2 align-items-center mb-3">
                                            <input type="text" name="other_links[title][]" class="form-control" value="{{ $link['title'] ?? '' }}" placeholder="Title (e.g. Blog)">
                                            <div class="input-group">
                                                <span class="input-group-text">{{ url('') }}</span>
                                                <input type="text" name="other_links[url][]" class="form-control" value="{{ $link['url'] ?? '' }}" placeholder="/blog">
                                            </div>
                                            <button type="button" class="btn p-0 border-0 bg-transparent text-danger remove-link"><i class="ti ti-trash fs-4"></i></button>
                                        </div>
                                    @empty
                                        <div class="link-row d-flex gap-2 align-items-center mb-3">
                                            <input type="text" name="other_links[title][]" class="form-control" placeholder="Title">
                                            <div class="input-group">
                                                <span class="input-group-text">{{ url('') }}</span>
                                                <input type="text" name="other_links[url][]" class="form-control" placeholder="/blog">
                                            </div>
                                            <button type="button" class="btn p-0 border-0 bg-transparent text-danger remove-link"><i class="ti ti-trash fs-4"></i></button>
                                        </div>
                                    @endforelse
                                </div>
                                <button type="button" class="btn btn-sm btn-label-primary mt-2 add-link" data-container="#other-links-container" data-name="other_links">
                                    <i class="ti ti-plus me-1"></i> Add Other Link
                                </button>
                            </div>

                            <!-- Social Links Section -->
                            <div class="col-12 mt-4 pt-2">
                                <h6 class="text-primary border-bottom pb-2 mb-3"><i class="ti ti-brand-twitter me-2"></i>Social Media Links</h6>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="facebook_link">Facebook URL</label>
                                <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="{{ old('facebook_link', $settings->facebook_link) }}" placeholder="https://facebook.com/...">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="twitter_link">X (Twitter) URL</label>
                                <input type="url" class="form-control" id="twitter_link" name="twitter_link" value="{{ old('twitter_link', $settings->twitter_link) }}" placeholder="https://x.com/...">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="linkedin_link">LinkedIn URL</label>
                                <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ old('linkedin_link', $settings->linkedin_link) }}" placeholder="https://linkedin.com/in/...">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="instagram_link">Instagram URL</label>
                                <input type="url" class="form-control" id="instagram_link" name="instagram_link" value="{{ old('instagram_link', $settings->instagram_link) }}" placeholder="https://instagram.com/...">
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="ti ti-device-floppy me-1"></i> Save Footer Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>
        $(document).ready(function() {
            $('.add-link').click(function() {
                const container = $($(this).data('container'));
                const name = $(this).data('name');
                const html = `
                    <div class="link-row d-flex gap-2 align-items-center mb-3">
                        <input type="text" name="${name}[title][]" class="form-control" placeholder="Title">
                        <div class="input-group">
                            <span class="input-group-text">{{ url('') }}</span>
                            <input type="text" name="${name}[url][]" class="form-control" placeholder="/route">
                        </div>
                        <button type="button" class="btn p-0 border-0 bg-transparent text-danger remove-link"><i class="ti ti-trash fs-4"></i></button>
                    </div>
                `;
                container.append(html);
            });

            $(document).on('click', '.remove-link', function() {
                const container = $(this).closest('[id$="-links-container"]');
                if (container.find('.link-row').length > 1) {
                    $(this).closest('.link-row').remove();
                } else {
                    $(this).closest('.link-row').find('input').val('');
                }
            });
        });
    </script>
@endpush


