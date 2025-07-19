@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card cardPdd">
            <div class="card-body topText">
                <div class="col-lg-12 margin-tb">
                    <div class="flexBdy">
                        <div class="pull-left">
                            <h5 class="card-title">Create New CMS Page</h5>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-sm mb-2 comnBtn whtTxt borderBtn" href="{{ route('cms.index') }}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
            <div class="alert alert-danger frmGrpMt">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="frmGrp">
                <form method="POST" action="{{ route('cms.store') }}" id="cmsForm">
                    @csrf
                    <div class="row">
                        <!-- BASIC INFO -->
                        <div class="col-md-12"><h6 class="section-title">Basic Info</h6></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong class="strng required-label">Title:</strong>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter Title" class="form-control required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong class="strng required-label">Page Title:</strong>
                                <input type="text" name="page_title" value="{{ old('page_title') }}" placeholder="Enter Page Title" class="form-control required">
                            </div>
                        </div>

                        <!-- CONTENT -->
                        <div class="col-md-12"><h6 class="section-title">Content</h6></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong class="strng required-label">Description:</strong>
                                <textarea name="description" id="description" class="form-control required">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <!-- META INFO -->
                        <div class="col-md-12"><h6 class="section-title">Meta Information</h6></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong class="strng required-label">Meta Title:</strong>
                                <input type="text" name="meta_title" value="{{ old('meta_title') }}" placeholder="Enter Meta Title" class="form-control required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong class="strng required-label">Meta Keywords:</strong>
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="Enter Meta Keywords" class="form-control required">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong class="strng required-label">Meta Description:</strong>
                                <textarea name="meta_description" id="meta_description" class="form-control required">{{ old('meta_description') }}</textarea>
                            </div>
                        </div>

                        <!-- STATUS -->
                        <div class="col-md-12"><h6 class="section-title">Status</h6></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong class="strng">Active Status:</strong><br>
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}> Active
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn btn-sm comnBtn">
                                <i class="fa-solid fa-floppy-disk"></i> Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery + Validation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        // Initialize CKEditor
        CKEDITOR.replace('description', {
            height: 300,
            removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Language,Link,Unlink,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,TextColor,BGColor,Maximize,ShowBlocks,About'
        });

        // Initialize CKEditor for meta description
        CKEDITOR.replace('meta_description', {
            height: 150,
            removeButtons: 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Language,Link,Unlink,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,TextColor,BGColor,Maximize,ShowBlocks,About'
        });

        // Form validation
        $("#cmsForm").validate({
            rules: {
                title: {
                    required: true,
                    minlength: 3,
                    maxlength: 255
                },
                description: {
                    required: true
                },
                page_title: {
                    required: true,
                    minlength: 3,
                    maxlength: 255
                },
                meta_title: {
                    required: true,
                    minlength: 3,
                    maxlength: 255
                },
                meta_keywords: {
                    required: true,
                    minlength: 3,
                    maxlength: 255
                },
                meta_description: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "Please enter a title",
                    minlength: "Title must be at least 3 characters long",
                    maxlength: "Title cannot exceed 255 characters"
                },
                description: {
                    required: "Please enter a description"
                },
                page_title: {
                    required: "Please enter a page title",
                    minlength: "Page title must be at least 3 characters long",
                    maxlength: "Page title cannot exceed 255 characters"
                },
                meta_title: {
                    required: "Please enter a meta title",
                    minlength: "Meta title must be at least 3 characters long",
                    maxlength: "Meta title cannot exceed 255 characters"
                },
                meta_keywords: {
                    required: "Please enter meta keywords",
                    minlength: "Meta keywords must be at least 3 characters long",
                    maxlength: "Meta keywords cannot exceed 255 characters"
                },
                meta_description: {
                    required: "Please enter a meta description"
                }
            },
            errorClass: "error",
            submitHandler: function(form) {
                // Update CKEditor content before form submission
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                form.submit();
            }
        });
    });
</script>

<!-- Styles -->
<style>
    .error { color: red; }
    .required-label::after {
        content: " *";
        color: red;
    }
    .section-title {
        font-weight: bold;
        font-size: 1.1rem;
        margin-top: 20px;
        margin-bottom: 10px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 5px;
    }
</style>
@endsection
