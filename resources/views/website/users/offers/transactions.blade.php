<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<table class="table align-middle mb-0 bg-white">
    <span>{{ $balance }}</span>
    <thead class="bg-light">

        <tr>
            <th>من </th>
            <th>العملية</th>
            <th>الى </th>
            <th>المبلغ</th>
            <th>مقابل </th>
            {{-- <th>الفاتورة</th> --}}
            <th>رقم المشروع</th>
            <th>التاريخ</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
            @php
                $result = json_decode($item->meta, true);
                
            @endphp
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="text-muted mb-0">
                                {{ $result['sender'] }}
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    {{ $result['type'] }}

                </td>
                <td>
                    {{ $result['receiver'] }}
                    {{-- @php
                        if ($item->type == 'withdraw') {
                            echo $result['receiver'];
                        } else {
                            echo '-';
                        }
                    @endphp --}}

                    {{-- <p class="text-muted mb-0"> {{ $amount }}</p> --}}
                </td>
                <td>
                    @php
                        $amount = $item->amount;
                        if ($item->amount < 0) {
                            $amount = $item->amount * -1;
                        }
                    @endphp ?>
                    <p class="text-muted mb-0"> {{ $amount }}</p>
                </td>

                {{-- <td>
                    <span class="badge badge-success rounded-pill d-inline">Active</span>
                </td> --}}
                <td>
                    {{-- @if ($item->type == 'withdraw')
                        @php
                            
                            echo $result['project_title'];
                        @endphp
                    @else
                        -
                    @endif --}}
                    <p class="text-muted mb-0">{{ $result['project_title'] }}</p>
                </td>
                <td>
                    <p class="text-muted mb-0">{{ $item->created_at }}</p>
                </td>
            </tr>
        @empty

            {{-- <p class="text-muted mb-0">لا توجد معاملات</p> --}}
        @endforelse


    </tbody>
</table>
