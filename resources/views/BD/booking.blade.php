@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}" media="screen">
@endsection

@section('main')
<section class="u-clearfix u-section-1" id="sec-dc21">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-expanded-width u-table u-table-responsive u-table-1">
            <table class="u-table-entity">
                <colgroup>
                    <col width="7.7%">
                    <col width="13.5%">
                    <col width="14.8%">
                    <col width="11.1%">
                    <col width="10.6%">
                    <col width="5.3%">
                    <col width="21.2%">
                    <col width="16.1%">
                </colgroup>
                <thead class="u-palette-1-base u-table-header u-table-header-1">
                <tr style="height: 46px;">
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">ID</th>
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">Имя клиента</th>
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">Телефон клиента</th>
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">Время</th>
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">Дата</th>
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">ПК</th>
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">Детали</th>
                    <th class="u-border-1 u-border-palette-1-base u-table-cell">Действие</th>
                </tr>
                </thead>
                <tbody class="u-table-body">
                <tr style="height: 75px;">
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-9">Row 1</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-10">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-11">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-12">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-13"></td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-14"></td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-15"></td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-16"></td>
                </tr>
                <tr style="height: 76px;">
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-17">Row 2</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-18">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-19">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-20">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-21"></td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-22"></td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-23"></td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-24"></td>
                </tr>
                <tr style="height: 76px;">
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-25">Row 3</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-26">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-27">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-28">Description</td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-29"></td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-30"></td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-31"></td>
                    <td class="u-border-3 u-border-grey-30 u-table-cell u-table-cell-32"></td>
                </tr>
                <tr style="height: 47px;">
                    <td class="u-border-1 u-border-grey-25 u-table-cell">Row 4</td>
                    <td class="u-border-1 u-border-grey-25 u-table-cell">Description</td>
                    <td class="u-border-1 u-border-grey-25 u-table-cell">Description</td>
                    <td class="u-border-1 u-border-grey-25 u-table-cell">Description</td>
                    <td class="u-border-1 u-border-grey-25 u-table-cell"></td>
                    <td class="u-border-1 u-border-grey-25 u-table-cell"></td>
                    <td class="u-border-1 u-border-grey-25 u-table-cell"></td>
                    <td class="u-border-1 u-border-grey-25 u-table-cell"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <a href="#sec-daa5" class="u-border-none u-btn u-button-style u-dialog-link u-palette-3-dark-2 u-text-hover-black u-btn-1">Изменить</a>
        <a href="" class="u-border-none u-btn u-button-style u-palette-2-dark-1 u-text-hover-black u-btn-2">Удалить</a><span class="u-dialog-link u-hover-feature u-icon u-icon-rectangle u-text-custom-color-2 u-icon-1" data-href="#sec-daa5"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 42 42" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-f894"></use></svg><svg class="u-svg-content" viewBox="0 0 42 42" x="0px" y="0px" id="svg-f894" style="enable-background:new 0 0 42 42;"><path style="fill:currentColor;" d="M37.059,16H26V4.941C26,2.224,23.718,0,21,0s-5,2.224-5,4.941V16H4.941C2.224,16,0,18.282,0,21
	s2.224,5,4.941,5H16v11.059C16,39.776,18.282,42,21,42s5-2.224,5-4.941V26h11.059C39.776,26,42,23.718,42,21S39.776,16,37.059,16z"></path></svg></span>
    </div>

</section>
@endsection
