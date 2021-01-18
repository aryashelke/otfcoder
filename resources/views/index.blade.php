@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('PDF Upload') }}</div>

                <div class="card-body">
                     <!-- <form method="POST" action="{{ route('pdf-upload') }}" id="pdf-form" enctype="multipart/form-data"> -->
                    <form id="pdf-form" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">
                            <label for="serach-input" class="col-md-4 col-form-label text-md-right">{{ __('Search Input') }}</label>

                            <div class="col-md-6">

                                <input id="serach-input" type="text" class="form-control{{ $errors->has('serach_input') ? ' is-invalid' : '' }}" name="serach_input" value="{{ old('serach_input') }}" required autofocus>

                                @if ($errors->has('serach_input'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('serach_input') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pdf-file1" class="col-md-4 col-form-label text-md-right">{{ __('PDF') }}</label>

                            <div class="col-md-6">
                                <input id="pdf-file" type="file" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="pdf_file" required accept="application/pdf">

                                @if ($errors->has('pdf_file'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pdf_file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <!-- <button type="submit">Submit</button> -->
                                <input name="submit" type="submit" id="pdf-btn-form" class="btn btn-primary" value="{{ __('Submit') }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    
    <script type="text/javascript">
        
        $(document).ready(function(){

            $("#pdf-form").submit(function(e){

                e.preventDefault();

                var formData = new FormData();
                formData.append("serach_input", $("#serach-input").val());
                formData.append("pdf_file", $("#pdf-file").prop('files')[0]);
                formData.append("_token", $('meta[name="csrf-token"]').attr('content'));

                $.ajax({
                    url: '{{ route("pdf-upload") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) { 
                        alert(data); 
                    },
                    error: function(xhr, textStatus, error){
                        if (xhr.responseText == null || xhr.responseText == "") {
                            alert("Server error");
                        }else{
                            alert(xhr.responseText);
                        }
                    }
                }); 
            });
       });

    </script>

@endsection