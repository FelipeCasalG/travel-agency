<x-layout>
    <x-slot:heading>
        Cities
    </x-slot:heading>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <p class="mt-2 text-sm text-gray-700">Manage the cities where the airlines and their flights operate.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <x-button href="/cities/create">Add city</x-button>
            </div>
        </div>
        <div class="mt-8 flow-root">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>

<script>
    $(document).ready(function() {

        fetchCities();

        function fetchCities() {
            $.ajax({
                type: 'GET',
                url: '/api/cities',
                success: function(response) {
                    $('tbody').html("");
                    $.each(response.cities, function(key, item) {
                        $('tbody').append(
                            '<tr>\
                            <x-table-main-data>' + item.id + '</x-main-table-data>\
                            <x-table-data>' + item.name + '</x-table-data>\
                            <x-table-data>' + item.incoming_flights_count + '</x-table-data>\
                            <x-table-data>' + item.outgoing_flights_count + '</x-table-data>\
                            <x-table-data>\
                            <x-table-button href="/cities/' + item.id + '/edit">Edit</x-table-button>\
                            <x-table-button href="/cities/' + item.id + '/delete">Delete</x-table-button>\
                            </x-table-data>\
                            </tr>'
                        );
                    }
                    );
                }
            });
        }
    });
</script>