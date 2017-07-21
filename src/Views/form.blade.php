@extends('footballdata::layout')


@section('content')
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-three-quarters">
                <form method="POST" action="/store" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="field">
                    <label class="label">CSV file</label>
                    <div class="control">
                      <input class="input" type="file" name="csvfile">
                    </div>
                  </div>
                  <div class="field">
                    <input type="submit" value="submit">
                  </div>
                </form>
            </div>
        </div>
    </div>
  </section>
@endsection