<div class="row standings-box ">
    <div class="col-md-12">
        @if($league->standing)
            <div class="table-responsive">
                <table class="table" aria-label="team table">
                    <thead>
                    <th>#</th>
                    <th>Teams</th>
                    <th>Played</th>
                    <th>Won</th>
                    <th>Drawn</th>
                    <th>Lost</th>
                    <th><abbr title="Goals For">GF</abbr></th>
                    <th><abbr title="Goals Against">GA</abbr></th>
                    <th><abbr title="Goals Difference">GD</abbr></th>
                    <th>Points</th>
                    </thead>
                    <tbody>
                    @foreach($league->standing as $standing)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{$standing->team->name}}</td>
                            <td>{{$standing->played}}</td>
                            <td>{{$standing->won}}</td>
                            <td>{{$standing->drawn}}</td>
                            <td>{{$standing->lost}}</td>
                            <td>{{$standing->goals_for}}</td>
                            <td>{{$standing->goals_against}}</td>
                            <td>{{$standing->goals_difference}}</td>
                            <td>{{$standing->points}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
