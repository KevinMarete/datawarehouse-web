  <!-- MAIN CONTENT-->
  <div class="main-content p-3">
    <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">User Listing</h3>
            @if (Session::has('pharmacy_msg'))
            {!! session('pharmacy_msg') !!}
            @endif
            <div class="table-data__tool">
              <div class="table-data__tool-left">
                <a href="/user/new" class="au-btn au-btn-icon bg-dark au-btn--small">
                  <i class="zmdi zmdi-plus"></i>ADD USER
                </a>
              </div>
            </div>
            <div class="table-responsive-sm">
              <table class="table table-striped table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">IsActive</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tfoot class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">IsActive</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($table_data as $row)
                  <tr>
                    <th scope="row">{{ $row['id'] }}</th>
                    <td>{{ $row['firstname'] }}</td>
                    <td>{{ $row['lastname'] }}</td>
                    <td>{{ $row['email'] }}</td>
                    <td>{{ $row['phone'] }}</td>
                    <td>{{ ($row['is_active']) ? 'Yes' : 'No' }}</td>
                    <td>{{ $row['role']['name'] }}</td>
                    <td>
                      <div class="table-data-feature float-left">
                        <a href="/user/view/{{ $row['id'] }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                          <i class="zmdi zmdi-edit"></i>
                        </a>
                        <a href="/user/delete/{{ $row['id'] }}" class="item delete" data-toggle="tooltip" data-placement="top" title="Delete">
                          <i class="zmdi zmdi-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- END DATA TABLE -->
          </div>
        </div>
      </div>
    </div>
  </div>