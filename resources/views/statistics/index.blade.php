@extends('layout.app')

@section('content')

    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">
            Statistics
        </h2>

        <form>
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="num_series">Number Series</label>
                    <input id="num_series" name="num_series" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <div id="error" class='invisible text-red-500 text-sm mt-2'>
                        Required
                    </div>
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="num_series">Result</label>
                    <div id="result" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white dark:text-gray-300 ">
                    </div>
                </div>
            </div>

            <div class="flex justify-start mt-6">
                <button type="submit" name='action' value='mean'
                    class="btn-submit-stat px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Mean</button>
            </div>
            <div class="flex justify-start mt-6">
                <button type="submit" name='action' value="median"
                    class="btn-submit-stat px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Median</button>
            </div>
            <div class="flex justify-start mt-6">
                <button type="submit" name='action' value="mode"
                    class="btn-submit-stat px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Mode</button>
            </div>
        </form>
    </section>
@endsection
