<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Hp</th>
        <th>Fungsi</th>
        <th>Lucky Spin</th>
        <th>Time1</th>
        <th>I Found</th>
        <th>Time2</th>
        <th>Jigsaw Pzl</th>
        <th>Teka Teki</th>
        <th>Time4</th>
        <th>CLSR</th>
        <th>Scrrabbel Me</th>
        <th>Time6</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @php
        $angkaAwal = 1
    @endphp
    @foreach ($participants as $participant)
    <tr>
        <th scope="row">{{ $angkaAwal++ }}</th>
        <td>{{ empty($participant->name) ? '-' :  $participant->name  }}</td>
        <td>{{ empty($participant->hp) ? '-' : $participant->hp  }}</td>
        <td>{{ \App\Models\Position::where('id', $participant->position_id)->first()->name }}</td>
        <td>{{ $stage1 = $participant->stage1 }}</td>
        <td>{{ round($participant->time1 / 60) }} menit</td>
        <td>{{ $stage2 = $participant->stage2 }}</td>
        <td>{{ round($participant->time2 / 60) }} menit</td>
        <td class="bg-light">{{ $stage3 = $participant->stage3 }}</td>
        <td class="bg-light">{{ round($participant->time3 / 60 ) }} menit</td>
        <td>{{ $stage4 = $participant->stage4 }}</td>
        <td>{{ round($participant->time4 / 60) }} menit</td>
        <td class="bg-light">{{ $stage5 = $participant->stage5 }}</td>
        <td class="bg-light">{{ round($participant->time5 / 60) }} menit</td>
        <td>{{ $stage6 = $participant->stage6 }}</td>
        <td>{{ round($participant->time6 / 60) }} menit</td>
        <td>{{ $participant->total  }}</td>
    </tr>    
    @endforeach
    </tbody>
</table>