@extends('dashboardA.layout.app')

@section('main')

    {{-- <h1> {{ trans('validation.custom.Add_user') }}</h1> --}}
    <h1>Add Category</h1>

    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <img src="{{ asset('dashbord/assets/images/default.jpg') }}" alt="" srcset="" width="200"
                    height="200" name='img' id="previewImage" style="object-fit: cover">
            </div>
            <div class="card">
                <div class="card-body">


                    <form role="form text-left" method="POST" action="{{ route('dashboard.portfolioCategory.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="mb-3">
                            <x-input-label for="exampleInputName" class="form-label" :value="__('Name')" />
                            <x-text-input type="name" class="form-control" id="exampleInputName" name="name"
                                :value="old('name')" required autocomplete="username" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="exampleInputEmail1" class="form-label" :value="__('text')" />
                            {{-- <style>
                                #container {
                                    width: 1000px;
                                    margin: 20px auto;
                                }
                                .ck-editor__editable[role="textbox"] {
                                    /* editing area */
                                    min-height: 200px;
                                }
                                .ck-content .image {
                                    /* block images */
                                    max-width: 80%;
                                    margin: 20px auto;
                                }
                            </style>
                            <div id="container">
                                <input type="text"name="text" id="editor">
                            </div>
                            <!--
                                The "super-build" of CKEditor&nbsp;5 served via CDN contains a large set of plugins and multiple editor types.
                                See https://ckeditor.com/docs/ckeditor5/latest/installation/getting-started/quick-start.html#running-a-full-featured-editor-from-cdn
                            -->
                            <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/super-build/ckeditor.js"></script>
                            <!--
                                Uncomment to load the Spanish translation
                                <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/super-build/translations/es.js"></script>
                            -->
                            <script>
                                // This sample still does not showcase all CKEditor&nbsp;5 features (!)
                                // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
                                CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                                    toolbar: {
                                        items: [
                                            'exportPDF','exportWord', '|',
                                            'findAndReplace', 'selectAll', '|',
                                            'heading', '|',
                                            'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                                            'bulletedList', 'numberedList', 'todoList', '|',
                                            'outdent', 'indent', '|',
                                            'undo', 'redo',
                                            '-',
                                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                                            'alignment', '|',
                                            'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                                            'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                                            'textPartLanguage', '|',
                                            'sourceEditing'
                                        ],
                                        shouldNotGroupWhenFull: true
                                    },
                                    // Changing the language of the interface requires loading the language file using the <script> tag.
                                    // language: 'es',
                                    list: {
                                        properties: {
                                            styles: true,
                                            startIndex: true,
                                            reversed: true
                                        }
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                                    heading: {
                                        options: [
                                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                                            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                                            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                                            { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                                            { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                                        ]
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                                    placeholder: 'Welcome to CKEditor 5!',
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                                    fontFamily: {
                                        options: [
                                            'default',
                                            'Arial, Helvetica, sans-serif',
                                            'Courier New, Courier, monospace',
                                            'Georgia, serif',
                                            'Lucida Sans Unicode, Lucida Grande, sans-serif',
                                            'Tahoma, Geneva, sans-serif',
                                            'Times New Roman, Times, serif',
                                            'Trebuchet MS, Helvetica, sans-serif',
                                            'Verdana, Geneva, sans-serif'
                                        ],
                                        supportAllValues: true
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                                    fontSize: {
                                        options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                                        supportAllValues: true
                                    },
                                    // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                                    htmlSupport: {
                                        allow: [
                                            {
                                                name: /.*/,
                                                attributes: true,
                                                classes: true,
                                                styles: true
                                            }
                                        ]
                                    },
                                    // Be careful with enabling previews
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                                    htmlEmbed: {
                                        showPreviews: true
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                                    link: {
                                        decorators: {
                                            addTargetToExternalLinks: true,
                                            defaultProtocol: 'https://',
                                            toggleDownloadable: {
                                                mode: 'manual',
                                                label: 'Downloadable',
                                                attributes: {
                                                    download: 'file'
                                                }
                                            }
                                        }
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                                    mention: {
                                        feeds: [
                                            {
                                                marker: '@',
                                                feed: [
                                                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                                    '@sugar', '@sweet', '@topping', '@wafer'
                                                ],
                                                minimumCharacters: 1
                                            }
                                        ]
                                    },
                                    // The "super-build" contains more premium features that require additional configuration, disable them below.
                                    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                                    removePlugins: [
                                        // These two are commercial, but you can try them out without registering to a trial.
                                        // 'ExportPdf',
                                        // 'ExportWord',
                                        'AIAssistant',
                                        'CKBox',
                                        'CKFinder',
                                        'EasyImage',
                                        // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                                        // Storing images as Base64 is usually a very bad idea.
                                        // Replace it on production website with other solutions:
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                                        // 'Base64UploadAdapter',
                                        'RealTimeCollaborativeComments',
                                        'RealTimeCollaborativeTrackChanges',
                                        'RealTimeCollaborativeRevisionHistory',
                                        'PresenceList',
                                        'Comments',
                                        'TrackChanges',
                                        'TrackChangesData',
                                        'RevisionHistory',
                                        'Pagination',
                                        'WProofreader',
                                        // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                                        // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                                        'MathType',
                                        // The following features are part of the Productivity Pack and require additional license.
                                        'SlashCommand',
                                        'Template',
                                        'DocumentOutline',
                                        'FormatPainter',
                                        'TableOfContents',
                                        'PasteFromOfficeEnhanced'
                                    ]
                                });
                            </script> --}}
                            <x-text-input type="text" class="form-control" id="exampleInputEmail1" name="text"
                            :value="old('text')" required autocomplete="username" />
                        </div>




                        <div class="mb-3">
                            <input type="file" class="form-label" name="img" id="imageInput">
                        </div>



                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <script>
                        const imageInput = document.getElementById("imageInput");
                        const previewImage = document.getElementById("previewImage");

                        imageInput.addEventListener("change", function(event) {
                            const file = event.target.files[0];

                            // Check for valid image file
                            if (file && file.type.startsWith("image/")) {
                                const reader = new FileReader();

                                reader.onload = function(event) {
                                    previewImage.src = event.target.result;
                                };

                                reader.readAsDataURL(file);
                            } else {
                                previewImage.src = ""; // Clear preview if not an image
                                alert("Please select an image file.");
                            }
                        });
                    </script>
                </div>
            </div>
            <a href="{{ url()->previous() }}" type="button" class="btn btn-light m-1 "> back</a>
        </div>
    </div>



@endsection

{{-- @section('page_title', trans('validation.custom.Add_user')) --}}
@section('page_title', 'add category')
