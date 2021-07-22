@extends('layouts.admin')


<!-- Sidebar -->
@section('sidebar')
@parent

@endsection
<!-- End of Sidebar -->


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    @if (session('createSuccess'))
            <div class="alert alert-success">
                <i class="fa fa-thumbs-up"></i>
                <h2>{{session('createSuccess')}}</h2>
            </div>
    @endif


    <!-- DataTales Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Booking Management</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <main class="container-main">
                <div class="row">
                  <div class="col-12 col-xl-8">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between mb-4">
                          <h2 class="mb-0 text-md">Revenue</h2>
                          <div class="form-group mb-0">
                            <label for="barChartFilter" class="sr-only">Filter revenue</label>

                            <select class="custom-select" id="barChartFilter">
                              <option disabled>Filter revenue</option>
                              <option value="weekly">Weekly</option>
                              <option value="monthly" selected>Monthly</option>
                              <option value="yearly">Yearly</option>
                            </select>

                          </div> <!-- end of form-group -->
                        </div> <!-- end of d-flex -->
                        <div>
                          <canvas id="myChart"></canvas>
                        </div>
                        <table class="table table-bordered" id="dataTable">
                          <thead>
                              <tr>
                                  <th></th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                                  <tr>
                                    <td>Total Revenue</td>
                                    <td>{{ $total }}$</td>
                                  </tr>
                                  <tr>
                                    <td>Booking Count</td>
                                    <td>{{ $count }}</td>
                                  </tr>
                                  <tr>
                                    <td>Cancelled Booking Count</td>
                                    <td>{{ $cancel_count }}</td>
                                  </tr>
                          </tbody>
                        </table>

                      </div> <!-- end of card-body -->
                    </div> <!-- end of card -->
                  </div> <!-- end of col -->

                  <div class="col-12 col-xl-4">
                    <div class="card h-100">
                      <div class="card-body" id="same">
                        <h2 class="mb-6 text-md">Tour Revenue</h2>
                        <div class="chart-compact-square">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tour</th>
                                    <th>Revenue</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                  <th>ID</th>
                                  <th>Tour</th>
                                  <th>Revenue</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($tours as $tour)
                                    <tr>
                                      <td>{{ $tour->id }}</td>
                                      <td>{{ $tour->name }}</td>
                                      @if (empty($tour->revenue))
                                        <td>0</td>
                                      @else
                                        <td>{{ $tour->revenue }}$</td>
                                      @endif

                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                          {{ $tours->fragment('same')->links() }}
                        </div> <!-- end of chart-compact-square -->
                      </div> <!-- end of card-body -->
                    </div> <!-- end of card -->
                  </div> <!-- end of col -->
                </div> <!-- end of row -->


                <div class="card shadow mb-4" id="booking_location">
                  <div class="card-header py-3">
                      <h5 class="m-0 font-weight-bold text-primary">Booking List</h5>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          @include('common.checkSave')
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th>Tour</th>
                                      <th>Quantity</th>
                                      <th>Total Price</th>
                                      <th>User</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                    <th>Tour</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>User</th>
                                  </tr>
                              </tfoot>
                              <tbody>
                                  @foreach ($tours as $tour)
                                    @foreach ($tour->users as $booking)
                                      <tr>
                                        <td>{{ $tour->name }}</td>
                                        <td>{{ $booking->pivot->quantity }}</td>
                                        <td>{{ $booking->pivot->total_price }}</td>
                                        <td>{{ $booking->name }}</td>
                                      </tr>
                                    @endforeach
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
                  {{ $tours->fragment('booking_location')->links() }}
              </div>

                <footer class="row mt-3">
                  <div class="col">
                    <p class="mb-0 text-secondary">&copy; 2019 Alex Andonie. All rights reserved.</p>
                  </div>
                </footer>
              </main> <!-- end of container-fluid -->
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
{{-- <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var datas = <?php echo json_encode($datas); ?>;
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
          datasets: [{
              label: 'Revenue',
              data: datas,
              backgroundColor: ['red', 'orange', 'blue', 'yellow', 'green', 'purple', 'beige', 'sliver', 'brown', 'pink', 'gray', 'black'],
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });
</script> --}}
{{-- <script>

    var ctx = document.getElementById("myChart").getContext('2d');
    var datas = <?php echo json_encode($datas); ?>;
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Revenue',
                data: datas,
                backgroundColor: ['red', 'orange', 'blue', 'yellow', 'green', 'purple', 'beige', 'sliver', 'brown', 'pink', 'gray', 'black'],
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script> --}}
{{-- <script>
$('#barChartFilter').change(function(){
    var x = document.getElementById("barChartFilter").value;
    $.ajax({
    type: "GET",
    data: { filter: x },
    url: "{{ route('revenue') }}",
    success:function(){
        var datas = <?php echo json_encode($datas); ?>;
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
                    label: 'Revenue',
                    data: datas,
                    backgroundColor: ['red', 'orange', 'blue', 'yellow', 'green', 'purple', 'beige', 'sliver', 'brown', 'pink', 'gray', 'black'],
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    }
    });
});
</script> --}}
//<script>
// $('#barChartFilter').change(function(){
//     var x = document.getElementById("barChartFilter").value;
//     $.ajax({
//         type: "GET",
//         data: { filter: "a" },
//         url: "{{ route('revenue') }}",
//         success:function(data){

//         alert(data.success);

//         }
        // success: function (response) {

        //     var datas = json_encode(response);
        //     var myChart = new Chart(ctx, {
        //         type: 'bar',
        //         data: {
        //             datasets: [{
        //                 label: 'Revenue',
        //                 data: datas,
        //                 backgroundColor: ['red', 'orange', 'blue', 'yellow', 'green', 'purple', 'beige', 'sliver', 'brown', 'pink', 'gray', 'black'],
        //             }]
        //         },
        //         options: {
        //             scales: {
        //                 yAxes: [{
        //                     ticks: {
        //                         beginAtZero:true
        //                     }
        //                 }]
        //             }
        //         }
        //     });
        // },
        // error: function(xhr) {
        //     console.log(xhr.responseJSON);
        // }
//    });
//</script>


<script type="text/javascript">
$(document).ready(function() {
  var ctx = document.getElementById("myChart").getContext('2d');
    var datas = @json($datas);
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Revenue',
                data: datas,
                backgroundColor: ['#ECEAE4', '#FFC8A2', '#95DDDA', '#E7E34E', '#97C1A9', '#E3E8CD', '#F6EAC2', '#55CBCD', '#EA7369', 'pink', '#CBAACB', '#81D4FA'],
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

  $('#barChartFilter').change(function(){
        var x = document.getElementById("barChartFilter").value;
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});
        $.ajax({
        type: "GET",
        url: "{{ route('chart') }}",
        dataType: "json",
        data:
        {
            filter: x,
        },
        success:function(response){
            myChart.data.labels = [];
            myChart.data.datasets[0].data = response;
            myChart.update();

        },
        error: function(xhr) {
        console.log(xhr.responseJSON);
        }
        });
  })
})
    </script>


@endsection

</html>
