@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Creatives</div>
                <div class="card-body">
                  <div class="col-sm">
                    <form class="" action="/creatives" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="date" name="send_date" placeholder="Send Date">
                      <input type="text" name="brand" placeholder="Channel">
                      <input type="text" name="sub_brand" placeholder="Sub Channel">
                      <input type="text" name="segment" placeholder="Segment">
                      <select name="type" placeholder="Type">
                        <option value="PRO">Promotion</option>
                        <option value="Newsletter">Newsletter</option>
                      </select>
                      <input type="text" name="advertiser" placeholder="Advertiser">
                      <input type="text" name="contract" placeholder="Contract Number">
                      <input type="text" name="info" placeholder="Additional Info">
                      <input type="file" name="creative">
                      <button type="submit" name="button">Submit Creatives</button>
                    </form>
                  </div>
                </div>
            </div>

        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Upload Date</th>
              <th>Send Date</th>
              <th>Channel</th>
              <th>Sub Channel</th>
              <th>Segment</th>
              <th>Type</th>
              <th>Advertiser</th>
              <th>Contract #</th>
              <th>Addition Info</th>
              <th>Original Creative Location/Name</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($uploads as $upload)
              <tr>
                <td>{{$upload->created_at}}</td>
                <td>{{$upload->send_date}}</td>
                <td>{{$upload->brand}}</td>
                <td>{{$upload->sub_brand}}</td>
                <td>{{$upload->segment}}</td>
                <td>{{$upload->type}}</td>
                <td>{{$upload->advertiser}}</td>
                <td>{{$upload->contract}}</td>
                <td>{{$upload->info}}</td>
                <td>{{$upload->originalFile_Loc}}
              </tr>
            @endforeach
          </tbody>
        </table>

    </div>
</div>
@endsection
