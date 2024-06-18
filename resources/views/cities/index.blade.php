<x-layout>
    <x-slot:heading>
        Cities
    </x-slot:heading>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <p class="mt-2 text-sm text-gray-700">Manage the cities where the airlines and their flights operate.</p>
            </div>
        </div>
        <div class="my-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Id</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Incoming
                                        flights</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Outgoing
                                        flights</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit/Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <!-- Data is fetched using AJAX -->
                            </tbody>
                        </table>
                        <div id="pagination" class="bg-gray-50">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <div class="flex-auto">
                <x-input class="w-full" placeholder="City name..."></x-input>
            </div>
            <div class="mt-4 sm:ml-2 sm:mt-0 flex-auto">
                <x-button onclick="createCity()">Add city</x-button>
            </div>
        </div>
    </div>
</x-layout>

<script>
    function fetchCities(page) {
        $.ajax({
            type: 'GET',
            url: '/api/cities?page=' + page,
            success: function(response) {
                $('tbody').html("");
                $.each(response.cities.data, function(key, item) {
                    $('tbody').append(
                        '<tr>\
                            <x-table-main-data>' + item.id + '</x-main-table-data>\
                            <x-table-data>' + item.name + '</x-table-data>\
                            <x-table-data>' + item.incoming_flights_count + '</x-table-data>\
                            <x-table-data>' + item.outgoing_flights_count + '</x-table-data>\
                            <x-table-data>\
                            <x-table-button href="/cities/' + item.id + '/edit">Edit</x-table-button>\
                            <x-table-button onclick="deleteCity(' + item.id + ')">Delete</x-table-button>\
                            </x-table-data>\
                            </tr>'
                    );
                });

                // Update pagination links
                $('#pagination').html('');
                if (response.cities.prev_page_url || response.cities.next_page_url) {
                    $('#pagination').append(
                        '<nav class="flex items-center justify-between border-t border-gray-200 px-4 py-3 sm:px-6"\
                                aria-label="Pagination">\
                                <div class="hidden sm:block">\
                                    <p class="text-sm text-gray-700">Showing<span class="font-medium"> ' + response.cities.from + ' \
                                        </span>to<span class="font-medium"> ' + response.cities.to + ' \
                                        </span>of<span class="font-medium"> ' + response.cities.total + ' \
                                        </span>results</p>\
                                </div>\
                                <div id="paginationBtn" class="flex flex-1 justify-between sm:justify-end">\
                                </div>\
                            </nav>'
                    );
                    if (response.cities.prev_page_url) {
                        $('#paginationBtn').append(
                            '<a onclick="fetchCities(' + (response.cities.current_page - 1) +
                            ')"\
                                class="relative inline-flex items-center rounded-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-200 focus-visible:outline-offset-0">Previous</a>'
                        );
                    } else {
                        $('#paginationBtn').append(
                            '<a class="relative ml-3 inline-flex items-center rounded-md px-3 py-2 text-sm font-semibold text-gray-400 ring-1 ring-inset ring-gray-200 focus-visible:outline-offset-0 cursor-not-allowed">Previous</a>'
                        );
                    }
                    if (response.cities.next_page_url) {
                        $('#paginationBtn').append(
                            '<a onclick="fetchCities(' + (response.cities.current_page + 1) +
                            ')"\
                                class="relative ml-3 inline-flex items-center rounded-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-200 focus-visible:outline-offset-0">Next</a>'
                        );
                    } else {
                        $('#paginationBtn').append(
                            '<a class="relative ml-3 inline-flex items-center rounded-md px-3 py-2 text-sm font-semibold text-gray-400 ring-1 ring-inset ring-gray-200 focus-visible:outline-offset-0 cursor-not-allowed">Next</a>'
                        );
                    }
                }
            }
        })
    }

    function deleteCity(id) {
        $.ajax({
            type: 'DELETE',
            url: '/api/cities/' + id,
            success: function(response) {
                fetchCities(1);
            }
        });
    }

    function createCity() {
        var name = $('input').val();
        $.ajax({
            type: 'POST',
            url: '/api/cities',
            data: {
                name: name
            },
            success: function(response) {
                fetchCities(1);
            }
        });
    }

    $(document).ready(function() {
        fetchCities(1);
    });
</script>
