<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Test Pitjarus</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body>
        <div class="container mt-3">
            <form action="{{ route('filter') }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col">
                        <select id="area" class="form-control" multiple="multiple" name="area[]"></select>
                    </div>

                    <div class="col">
                        <input type="date" class="form-control" placeholder="Enter date from" name="date_from">
                    </div>

                    <div class="col">
                        <input type="date" class="form-control" placeholder="Enter date to" name="date_to">
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-primary">View</button>
                    </div>
                </div>
            </form>

            <canvas id="myChart" width="400" height="100" class="mt-3"></canvas>

            <table class="table mt-5">
                <thead class="table-dark">
                        <tr>
                            <th scope="col">Brand</th>
                            @foreach ($arrChart as $ac)
                                <th scope="col">{{ $ac->area }}</th>
                            @endforeach
                        </tr>
                </thead>
                <tbody>
                    @foreach ($productReports as $product)
                        <tr>
                            <td scope="col">{{$product->product->product_name}}</td>
                            @foreach ($arrChart as $ac)
                                <td scope="col">{{number_format((float)$ac->result/$reportRowTable->count(), 2, '.', '')}}%</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </body>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#area").select2({
                placeholder: 'Choose Area',
                ajax: {
                    url: "http://127.0.0.1:8000/api/areas",
                    dataType: 'json',
                    data: (params) => {
                        return {
                            q: params.term,
                        }
                    },
                    processResults: (data, params) => {
                        const results = data.areas.map(item => {
                            return {
                                id: item.area_id,
                                text: item.area_name,
                            };
                        });
                        return {
                            results: results,
                        }
                    },
                },
            });
        })
    </script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [@foreach ($arrChart as $ac)
                            "{{$ac->area}}",
                        @endforeach],
                datasets: [{
                    label: 'Nilai',
                    data: [@foreach ($arrChart as $ac)
                            "{{$ac->result}}",
                        @endforeach],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</html>
