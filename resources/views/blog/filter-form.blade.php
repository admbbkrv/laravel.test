<x-form actrion="{{route('blog.index')}}" method="get">
    <x-row>
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-input name="search" value="{{request('search')}}" placeholder="{{__('Поиск')}}" />
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-select name="category_id" value="{{request('category_id')}}" :options="[null => 'Все категории', 1 => 'Первая категория', 2 => 'Вторая категория']" />
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-button type="submit" class="w-100">{{__('Применить')}}</x-button>
            </div>
        </div>
    </x-row>
</x-form>