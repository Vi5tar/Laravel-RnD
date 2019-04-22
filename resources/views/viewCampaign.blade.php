@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit CPL Campaign</div>
                <div class="card-body">
                  <div class="col-sm">
                    <form class="" action="/cplcampaigns/{{$cplCampaign->id}}" method="POST">
                      {{ method_field('PATCH') }}
                      {{ csrf_field() }}
                      <input type="text" name="campaign" value="{{$cplCampaign->campaign}}" required>
                      <input type="text" name="premium_offer" value="{{$cplCampaign->premium_offer}}" required>
                      <input type="text" name="subjectline_1" value="{{$cplCampaign->subjectline_1}}" required>
                      <input type="text" name="subjectline_2" value="{{$cplCampaign->subjectline_2}}">
                      <input type="text" name="creative_1_name" value="{{$cplCampaign->creative_1_name}}" required>
                      <input type="text" name="creative_1_location" value="{{$cplCampaign->creative_1_location}}" required>
                      <input type="text" name="creative_2_name" value="{{$cplCampaign->creative_2_name}}">
                      <input type="text" name="creative_2_location" value="{{$cplCampaign->creative_2_location}}">
                      <input type="text" name="landing_page_url" value="{{$cplCampaign->landing_page_url}}" required>
                      <input type="text" name="utm_template" value="{{$cplCampaign->utm_template}}" required>
                      <button type="submit" name="button">Edit Campaign</button>
                    </form>
                    <form class="" action="/cplcampaigns/{{$cplCampaign->id}}" method="post">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" name="button">Delete Campaign</button>
                    </form>
                  </div>
                </div>
            </div>

        </div>
        <table class="table-responsive table-striped">
          <thead>
            <tr>
              <th>Campaign</th>
              <th>Premium/Offer</th>
              <th>SubjectLine 1</th>
              <th>SubjectLine 2</th>
              <th>Creative 1 Name</th>
              <th>Creative 1 Location</th>
              <th>Creative 2 Name</th>
              <th>Creative 2 Location</th>
              <th>Landing Page URL</th>
              <th>UTM Template</th>
            </tr>
          </thead>
          <tbody>

              <tr>
                <td>{{$cplCampaign->campaign}}</td>
                <td>{{$cplCampaign->premium_offer}}</td>
                <td>{{$cplCampaign->subjectline_1}}</td>
                <td>{{$cplCampaign->subjectline_2}}</td>
                <td>{{$cplCampaign->creative_1_name}}</td>
                <td>{{$cplCampaign->creative_1_location}}</td>
                <td>{{$cplCampaign->creative_2_name}}</td>
                <td>{{$cplCampaign->creative_2_location}}</td>
                <td>{{$cplCampaign->landing_page_url}}</td>
                <td>{{$cplCampaign->utm_template}}</td>
              </tr>


          </tbody>
        </table>

    </div>
</div>
@endsection
