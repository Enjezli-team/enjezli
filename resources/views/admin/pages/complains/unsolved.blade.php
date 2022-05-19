<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<table class="table align-middle mb-0 bg-white">
    {{-- <span>{{ $balance }}</span> --}}
    <thead class="bg-light">

        <tr>
            <th>المشروع</th>
            <th>طالب الخدمة</th>
            <th>سبب الرفض </th>
            <th>مقدم الخدمة</th>
            <th>نص الشكوى </th>
            <th>الاجراء</th>
            <th>التاريخ</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#cancel{{ $item->id }}">
                حل النزاع
            </button>
            <a href="projects/{{ $item->sal_offer->sal_project_id->id }}#offer{{ $item->offer_id }}">
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="text-muted mb-0">
                                    {{ $item->sal_offer->sal_project_id->title }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{ $item->sal_offer->sal_project_id->sal_created_by->name }}

                    </td>
                    <td>
                        {{ $item->seeker_reason }}
                    </td>
                    <td>
                        <p class="text-muted mb-0"> {{ $item->sal_offer->sal_provider_by->name }}</p>
                    </td>
                    <td>
                        <p class="text-muted mb-0">{{ $item->provider_complain }}</p>
                    </td>
                    <td>
                        @if ($item->provider_complain)
                            <a href='' class="text-muted mb-0">شات</a>
                            <a href="{{ route('loadsolutionForm', $item->id) }}" class="text-muted mb-0">حل النزاع</a>
                        @endif

                    </td>
                    <td>
                        <p class="text-muted mb-0">{{ $item->created_at }}</p>
                    </td>

                </tr>
            </a>
            <div class="modal fade" id="cancel {{ $item->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">الغاء عرض</h5>
                            <button type="button" class="btn-close " data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            هل أنت متأكد من الغاء العرض ؟
                        </div>
                        <div class="modal-footer">
                            <a style='background-color:transparent'> <button type="button" class="btn btn-success"
                                    data-bs-dismiss="modal">Cancel</button></a>

                            {{-- <a style='background-color:transparent'
                                href="{{ route('cancelOffer', $offer->id) }}"> --}}
                            <button type="button" class="btn btn-danger"> تأكيد</button>
                            {{-- </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        @empty

            {{-- <p class="text-muted mb-0">لا توجد معاملات</p> --}}
        @endforelse


    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
