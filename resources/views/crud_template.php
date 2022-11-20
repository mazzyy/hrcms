@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6> <button type="button" style="float:right" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Create Tab</button> Admin Table</h6>

                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Prority</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        created_at </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        updated_at </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($sidebar as $s )
                                    <tr id={{$s->id}}>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div
                                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                                    <i class="{{$s->icon}} text-sm opacity-10"></i>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$s->name }}</h6>
                                                    {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$s->priority}}</p>
                                            {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($s->status == "1")
                                            <span class="badge badge-sm bg-gradient-success">Active</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-warning">NotActive</span>
                                            @endif

                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$s->created_at}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$s->updated_at}}</span>
                                        </td>
                                        <td class="align-middle">

                                            <div class="dropdown">
                                                <button class="btn btn-link text-secondary -info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                  <li><a type="button"class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#editModal" onclick="Edit({{$s->id}})" >Edit</a></li>
                                                  <li><a class="dropdown-item"  onclick="Delete({{$s->id}})" href="#">Delete</a></li>
                                                  {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                                                </ul>
                                              </div>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Projects table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Project</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Budget</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Completion</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Spotify</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">$2,500</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">working</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">60%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar"
                                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-secondary mb-0">
                                            <i class="fa fa-ellipsis-v text-xs"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="/img/small-logos/logo-invision.svg"
                                                    class="avatar avatar-sm rounded-circle me-2" alt="invision">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Invision</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">$5,000</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">done</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">100%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar"
                                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 100%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-xs"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="/img/small-logos/logo-jira.svg"
                                                    class="avatar avatar-sm rounded-circle me-2" alt="jira">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Jira</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">$3,400</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">canceled</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">30%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                        aria-valuenow="30" aria-valuemin="0" aria-valuemax="30"
                                                        style="width: 30%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-xs"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="/img/small-logos/logo-slack.svg"
                                                    class="avatar avatar-sm rounded-circle me-2" alt="slack">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Slack</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">$1,000</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">canceled</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">0%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"
                                                        style="width: 0%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-xs"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="/img/small-logos/logo-webdev.svg"
                                                    class="avatar avatar-sm rounded-circle me-2" alt="webdev">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Webdev</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">$14,000</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">working</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">80%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="80"
                                                        style="width: 80%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-xs"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="/img/small-logos/logo-xd.svg"
                                                    class="avatar avatar-sm rounded-circle me-2" alt="xd">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Adobe XD</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">$2,300</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">done</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">100%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar"
                                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 100%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-xs"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- create modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" action="{{route('store')}}">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Name</label>
                            <input name="name" class="form-control" type="text" value="John Snow"
                                id="example-text-input">
                        </div>
                        <div class="form-group">
                            <label for="example-search-input" class="form-control-label">Link</label>
                            <input name="Link" class="form-control" type="search" value="Tell me your secret ..."
                                id="example-search-input">
                        </div>
                        <div class="form-group">
                            <label for="example-search-input" class="form-control-label">Icon</label>
                            {{-- <input class="form-control" type="search" value="Tell me your secret ..." id="example-search-input"> --}}
                            <select name="icon" class="form-control form-control-lg">
                                <option disabled>Select</option>
                                <option value="ni ni-world-2 text-danger">icon 1</option>
                                <option value="ni ni-app text-info">icon 2</option>
                                <option value="ni ni-single-copy-04 text-warning ">icon 3</option>
                            </select>
                        </div>

                        <div>
                            <input type="submit" class="btn bg-gradient-primary" value="Create">
                        </div>


                    </form>
                </div>
                {{-- <div class="modal-footer">
                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn bg-gradient-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>


    {{-- Edit modal --}}

     <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="get" action="{{route('routeUpdate')}}">
                     <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Name</label>
                         <input name="name" class="form-control" type="text" value="-" id="edit_name">

                     </div>
                     <div class="form-group">
                         <label for="example-search-input" class="form-control-label">Link</label>
                         <input name="link" class="form-control" type="search" value="Tell me your secret ..."
                             id="edit_link">
                     </div>
                     <div class="form-group">
                         <label for="example-search-input" class="form-control-label">Icon</label>
                         {{-- <input class="form-control" type="search" value="Tell me your secret ..." id="example-search-input"> --}}
                         <select name="icon" id="edit_icon" class="form-control form-control-lg">
                             <option selected disabled >Select</option>
                             <option value="ni ni-world-2 text-danger">icon 1</option>
                             <option value="ni ni-app text-info">icon 2</option>
                             <option value="ni ni-single-copy-04 text-warning ">icon 3</option>
                         </select>
                     </div>
                     <div class="form-group" >
                        <label for="example-search-input" class="form-control-label">Priority</label>
                        <input name="priority"  class="form-control" type="search" value="Tell me your secret ..."
                            id="edit_priority">
                    </div>
                    <div class="form-group">
                        <label for="example-search-input" class="form-control-label">Icon</label>
                        {{-- <input class="form-control" type="search" value="Tell me your secret ..." id="example-search-input"> --}}
                        <select name="status" id="edit_status" class="form-control form-control-lg">
                            <option disabled >Select</option>
                            <option value="1">Active</option>
                            <option value="0">NotActive</option>

                        </select>
                    </div>
                    <div class="form-group">
                         <label for="example-search-input" class="form-control-label">Id</label>
                         <input name="id" class="form-control" type="search" value=""
                             id="edit_id">
                     </div>


                     <div>
                         <input type="submit" class="btn bg-gradient-primary" value="Create">
                     </div>


                 </form>
             </div>
             {{-- <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
               <button type="button" class="btn bg-gradient-primary">Save changes</button>
             </div> --}}
         </div>
     </div>
 </div>
    @include('layouts.footers.auth.footer')
</div>


<script>
    function Delete(id){

        console.log(id)
        $.ajax({
                    type: 'GET',
                    url: '{{ route('routedelete') }}',
                    data: {'id': id},

                    success: function(results) {
                        console.log(results);
                        document.getElementById(id).remove();
                    },
                    Error: function(results) {
                        console.log(results);

                    }


                      //Laravel validation error function



                });

    }

</script>

<script>
    function Edit(id){


        $.ajax({
                    type: 'GET',
                    url: '{{route('routeEdit')}}',
                    data: {'id': id},

                    success: function(results) {
                        console.log(results);
                     document.getElementById("edit_name").value=results.name;
                     document.getElementById("edit_link").value=results.link;
                     document.getElementById("edit_icon").value=results.icon;
                     document.getElementById("edit_priority").value=results.priority;
                     document.getElementById("edit_status").value=results.status;
                     document.getElementById("edit_id").value=results.id;
                    },
                    Error: function(results) {
                        console.log(results);

                    }


                      //Laravel validation error function



                });
           }








</script>

<script>

</script>
@endsection

@push('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


@endpush
