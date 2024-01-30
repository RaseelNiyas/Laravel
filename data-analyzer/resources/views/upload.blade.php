@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Excel File</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('upload.process') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="file">Select Excel File (.xlsx)</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".xlsx" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>

                    <hr>

                    @isset($previewData)
                        <h4>Preview of Excel File</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    @foreach($previewData[0] as $column)
                                    @if(is_array($column))
                                    @foreach($column as $item)
                                        <th>{{ $item }}</th>
                                    @endforeach
                                @else
                                    <th>{{ $column }}</th>
                                @endif                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i < count($previewData); $i++)
                                    <tr>
                                        @foreach($previewData[$i] as $value)
                                        <td>
                                            @if(is_array($value))
                                                @foreach($value as $item)
                                                    {{ $item }}
                                                @endforeach
                                            @else
                                                {{ $value }}
                                            @endif
                                        </td>
                                                                                @endforeach
                                    </tr>
                                @endfor
                            </tbody>
                        </table>

                        <a href="{{ route('download') }}" class="btn btn-success">Download Original File</a>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
