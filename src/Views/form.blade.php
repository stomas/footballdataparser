@extends('footballdata::layout')


@section('content')
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-three-quarters">
                <form>
                  <div class="field">
                    <label class="label">CSV file</label>
                    <div class="control">
                      <input class="input" type="file">
                    </div>
                  </div>
                  <div class="field">
                    <button class="button is-primary">Submit</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
  </section>
@endsection