@extends('layouts.baseminimal')
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><strong>Adicionar novo post no blog</strong></small>
                        </div>
                        <div class="card-body">
                        <form method="POST" action="{{ route('blog.store') }}" role="form">
                            @csrf
                            <div class="form-group row mb-12">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="note_type">
                                        <option>Manutenção</option>
                                        <option>Noticia</option>
                                        <option>Melhoria</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                <div class="col-sm-12 col-md-9">
                                    <textarea class="summernote-simple" name="content"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">URL Image
                                    800x600</label>
                                <div class="col-sm-12 col-md-7">
                                    <!--
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" />
                                    </div>
                                -->
                                    <input type="text" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="status_id">
                                        <option value="1">Publish</option>
                                        <option value="4">Expired</option>
                                        <option value="2">Hot</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" type="submit">Create Post</button>
                                </div>
                            </div>
                        </form>

                        <!-- End Blog -->
                        <script>
                            CKEDITOR.replace('content');
                        </script>
                    @endsection

                    @section('javascript')
                    @endsection
