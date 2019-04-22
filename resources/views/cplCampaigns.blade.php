@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New CPL Campaign</div>
                <div class="card-body">
                  <div class="col-sm">
                    <form class="" action="/cplcampaigns" method="post">
                      {{ csrf_field() }}
                      <input type="text" name="campaign" placeholder="Campaign Name" required>
                      <input type="text" name="premium_offer" placeholder="Premium" required>
                      <input type="text" name="subjectline_1" placeholder="Subject Line 1" required>
                      <input type="text" name="subjectline_2" placeholder="Subject Line 2">
                      <input type="text" name="creative_1_name" placeholder="Creative 1 File Name" required>
                      <input type="text" name="creative_1_location" placeholder="Creative 1 Location" required>
                      <input type="text" name="creative_2_name" placeholder="Creative 2 File Name">
                      <input type="text" name="creative_2_location" placeholder="Creative 2 File Location">
                      <input type="text" name="landing_page_url" placeholder="Landing Page URL" required>
                      <input type="text" name="utm_template" placeholder="UTM Template" required>
                      <button type="submit" name="button">Submit Campaign</button>
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
            @foreach ($cpls as $cpl)
              <tr>
                <td>
                  <a href={{'cplcampaigns/' . $cpl->id}}>{{$cpl->campaign}}</a>
                </td>
                <td>{{$cpl->premium_offer}}</td>
                <td>{{$cpl->subjectline_1}}</td>
                <td>{{$cpl->subjectline_2}}</td>
                <td>{{$cpl->creative_1_name}}</td>
                <td>{{$cpl->creative_1_location}}</td>
                <td>{{$cpl->creative_2_name}}</td>
                <td>{{$cpl->creative_2_location}}</td>
                <td>{{$cpl->landing_page_url}}</td>
                <td>{{$cpl->utm_template}}</td>
              </tr>
            @endforeach

          </tbody>
        </table>

    </div>
</div>
@endsection
