@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}" media="screen">
@endsection

@section('main')
<section class="u-clearfix u-section-1" id="sec-dc21">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-expanded-width u-table u-table-responsive u-table-1">
            <table class="u-table-entity">
                <colgroup>
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead class="u-palette-1-base u-table-header u-table-header-1">
                <tr style="height: 46px;">
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">ID</th>
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">Товар</th>
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">Цена</th>
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">Адрес</th>
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">Действие</th>
                </tr>
                </thead>
                <tbody class="u-table-body">
                <tr style="height: 75px;">
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-6">Row 1</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-7">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-8">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-9">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-10"></td>
                </tr>
                <tr style="height: 76px;">
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-11">Row 2</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-12">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-13">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-14">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-15"></td>
                </tr>
                <tr style="height: 76px;">
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-16">Row 3</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-17">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-18">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-19">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-20"></td>
                </tr>
                <tr style="height: 47px;">
                    <td class="u-border-1 u-border-grey-25 u-table-cell">Row 4</td>
                    <td class="u-border-1 u-border-grey-25 u-table-cell">Description</td>
                    <td class="u-border-1 u-border-grey-25 u-table-cell">Description</td>
                    <td class="u-border-1 u-border-grey-25 u-table-cell">Description</td>
                    <td class="u-border-1 u-border-grey-25 u-table-cell"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <a href="#sec-e12c" class="u-border-none u-btn u-button-style u-dialog-link u-palette-3-dark-2 u-text-hover-black u-btn-1">Изменить</a>
        <a href="" class="u-border-none u-btn u-button-style u-palette-2-dark-1 u-text-hover-black u-btn-2">Удалить</a><span class="u-dialog-link u-icon u-text-custom-color-2 u-icon-1" data-href="#sec-9330"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 42 42" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-f894"></use></svg><svg class="u-svg-content" viewBox="0 0 42 42" x="0px" y="0px" id="svg-f894" style="enable-background:new 0 0 42 42;"><path style="fill:currentColor;" d="M37.059,16H26V4.941C26,2.224,23.718,0,21,0s-5,2.224-5,4.941V16H4.941C2.224,16,0,18.282,0,21
	s2.224,5,4.941,5H16v11.059C16,39.776,18.282,42,21,42s5-2.224,5-4.941V26h11.059C39.776,26,42,23.718,42,21S39.776,16,37.059,16z"></path></svg></span>
    </div>
</section>
@endsection
