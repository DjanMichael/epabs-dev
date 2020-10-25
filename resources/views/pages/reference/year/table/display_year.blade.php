<hr>
<table class="table" data-show-toggle="false" data-expand-first="true">
    <thead>
        <tr>
            <th data-visible="false">ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th data-breakpoints="xs">Job Title</th>
            <th data-breakpoints="xs sm">Started On</th>
            <th data-breakpoints="all" data-title="DOB">Date of Birth</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Dennise</td>
            <td>Fuhrman</td>
            <td>High School History Teacher</td>
            <td>November 8th 2011</td>
            <td>July 25th 1960</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Elodia</td>
            <td>Weisz</td>
            <td>Wallpaperer Helper</td>
            <td>October 15th 2010</td>
            <td>March 30th 1982</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Raeann</td>
            <td>Haner</td>
            <td>Internal Medicine Nurse Practitioner</td>
            <td>November 28th 2013</td>
            <td>February 26th 1966</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Junie</td>
            <td>Landa</td>
            <td>Offbearer</td>
            <td>October 31st 2010</td>
            <td>March 29th 1966</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Solomon</td>
            <td>Bittinger</td>
            <td>Roller Skater</td>
            <td>December 29th 2011</td>
            <td>September 22nd 1964</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Bar</td>
            <td>Lewis</td>
            <td>Clown</td>
            <td>November 12th 2012</td>
            <td>August 4th 1991</td>
        </tr>
        <tr>
            <td>7</td>
            <td>Usha</td>
            <td>Leak</td>
            <td>Ships Electronic Warfare Officer</td>
            <td>August 14th 2012</td>
            <td>November 20th 1979</td>
        </tr>
        <tr>
            <td>8</td>
            <td>Lorriane</td>
            <td>Cooke</td>
            <td>Technical Services Librarian</td>
            <td>September 21st 2010</td>
            <td>April 7th 1969</td>
        </tr>
    </tbody>
</table>
{{--
<table class="table mb-5 table-hover table-bordered" data-show-toggle="false" data-expand-first="true">
    <thead>
        <tr>
            <th data-visible="false">ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th data-breakpoints="xs">Job Title</th>
            <th data-breakpoints="xs sm">Started On</th>
            <th data-breakpoints="all" data-title="DOB">Date of Birth</th>
        </tr>
    </thead>

    <thead class="bg-dark text-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Year</th>
            <th scope="col" class="text-center">Year</th>
            <th scope="col" class="text-center">Year</th>
            <th scope="col" class="text-center" data-breakpoints="xs">Status</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($year as $row)
            <tr id="{{ $row["id"] }}">
                <td>{{ $row["id"] }}</td>
                <td data-target="year">{{ $row["year"] }}</td>
                <td data-target="year">{{ $row["year"] }}</td>
                <td data-target="year">{{ $row["year"] }}</td>
                <td data-target="status">
                    <span class="label label-inline {{ $row["status"] == 'ACTIVE' ? 'label-light-success' : 'label-light-danger' }} font-weight-bold">{{ $row["status"] }}</span>
               </td>
                <td>
                    <a class="btn btn-icon btn-light-primary mr-2" title="Edit Details" data-role="edit" data-id="{{ $row["id"] }}">
                        <i class="flaticon-edit-1"></i>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="12" class="text-center"> NO DATA AVAILABLE IN TABLE</td>
            </tr>
        @endforelse
    </tbody>
</table>
<hr>


<div id="table_pagination">
    {{ $year->links('components.global.pagination') }}
</div> --}}

{{-- <div class="card-body">
    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
        <thead>
            <tr>
                <th title="Field #1">Order ID</th>
                <th title="Field #2">Car Make</th>
                <th title="Field #3">Car Model</th>
                <th title="Field #4">Color</th>
                <th title="Field #5">Deposit Paid</th>
                <th title="Field #6">Order Date</th>
                <th title="Field #7">Status</th>
                <th title="Field #8">Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>0006-3629</td>
                <td>Land Rover</td>
                <td>Range Rover</td>
                <td>Orange</td>
                <td>$22672.60</td>
                <td>2016-11-28</td>
                <td class="text-right">3</td>
                <td class="text-right">3</td>
            </tr>
            <tr>
                <td>0187-0063</td>
                <td>Mercedes-Benz</td>
                <td>S-Class</td>
                <td>Goldenrod</td>
                <td>$97306.72</td>
                <td>2017-11-06</td>
                <td class="text-right">5</td>
                <td class="text-right">3</td>
            </tr>
        </tbody>
    </table>
    <!--end: Datatable-->
</div> --}}

