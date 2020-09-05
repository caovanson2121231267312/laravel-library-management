@foreach ($subCategories as $subCategory)
    <tr data-id="{{ $subCategory->id }}" data-parent="{{$dataParent}}" data-level = "{{$dataLevel + 1}}">
        <td data-column="name">
            <a class="decoration-none text-green" href="{{ route('show_by_category', [$subCategory->name, $subCategory->id]) }}">
                {{ $subCategory->name }}
            </a>
        </td>
    </tr>
    @if (count($subCategory->subCategories))
        @include ('sub_categories_list', [
            'subCategories' => $subCategory->subCategories, 
            'dataParent' => $subCategory->id, 
            'dataLevel' => $dataLevel,
        ])
    @endif
@endforeach
