<template>
    <div class="table-ag-div py-5">
        <div class="container">
            <h2 class="comon-heading m-0 text-left">
                Tabla de posiciones &amp; Calendario
            </h2>

            <div class="row g-lg-5">
                <div class="col-lg-5">
                    <div class="table-div-left mt-4">
                        <h4 class="text-left">Serie A</h4>

                        <div id="seri1_wrapper" class="dataTables_wrapper">
                            <div class="dataTables_scroll">
                                <div
                                    class="dataTables_scrollHead"
                                    style="
                                        overflow: hidden;
                                        position: relative;
                                        border: 0px;
                                        width: 100%;
                                    "
                                >
                                    <div
                                        class="dataTables_scrollHeadInner"
                                        style="
                                            box-sizing: content-box;
                                            width: 466px;
                                            padding-right: 17px;
                                        "
                                    >
                                        <table
                                            class="display dataTable"
                                            style="
                                                width: 466px;
                                                margin-left: 0px;
                                            "
                                        >
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="sorting sorting_asc"
                                                        tabindex="0"
                                                        aria-controls="seri1"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 168.922px"
                                                        aria-sort="ascending"
                                                        aria-label="Club: activate to sort column descending"
                                                    >
                                                        Club
                                                    </th>
                                                    <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="seri1"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 56.6562px"
                                                        aria-label="W: activate to sort column ascending"
                                                    >
                                                        W
                                                    </th>
                                                    <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="seri1"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 49.6875px"
                                                        aria-label="D: activate to sort column ascending"
                                                    >
                                                        D
                                                    </th>
                                                    <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="seri1"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 46.7344px"
                                                        aria-label="L: activate to sort column ascending"
                                                    >
                                                        L
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div
                                    class="dataTables_scrollBody"
                                    style="
                                        position: relative;
                                        overflow: auto;
                                        max-height: 200px;
                                        width: 100%;
                                    "
                                >
                                    <table
                                        id="seri1"
                                        class="display dataTable"
                                        style="width: 100%"
                                        aria-describedby="seri1_info"
                                    >
                                        <thead>
                                            <tr style="height: 0px">
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 168.922px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Club
                                                    </div>
                                                </th>
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 56.6562px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        W
                                                    </div>
                                                </th>
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 49.6875px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        D
                                                    </div>
                                                </th>
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 46.7344px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        L
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="height: 0px">
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 184.922px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Club
                                                    </div>
                                                </th>
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 72.6562px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        W
                                                    </div>
                                                </th>
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 65.6875px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        D
                                                    </div>
                                                </th>
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 62.7344px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        L
                                                    </div>
                                                </th>
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                            <tr class="odd">
                                                <td class="sorting_1">
                                                    <div class="comon-ft-cl">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="fbn"
                                                                class="img-tabla-posiciones"
                                                            />
                                                            <figcaption>
                                                                Escobedo
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                </td>
                                                <td>13</td>
                                                <td>01</td>
                                                <td>61</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="sorting_1">
                                                    <div class="comon-ft-cl">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="fbn"
                                                                class="img-tabla-posiciones"
                                                            />
                                                            <figcaption>
                                                                Escobedo
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                </td>
                                                <td>12</td>
                                                <td>20</td>
                                                <td>61</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="sorting_1">
                                                    <div class="comon-ft-cl">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="fbn"
                                                                class="img-tabla-posiciones"
                                                            />
                                                            <figcaption>
                                                                Escobedo
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                </td>
                                                <td>25</td>
                                                <td>36</td>
                                                <td>61</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="sorting_1">
                                                    <div class="comon-ft-cl">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="fbn"
                                                                class="img-tabla-posiciones"
                                                            />
                                                            <figcaption>
                                                                Escobedo
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                </td>
                                                <td>25</td>
                                                <td>36</td>
                                                <td>61</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="sorting_1">
                                                    <div class="comon-ft-cl">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="fbn"
                                                                class="img-tabla-posiciones"
                                                            />
                                                            <figcaption>
                                                                Escobedo
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                </td>
                                                <td>12</td>
                                                <td>36</td>
                                                <td>61</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div
                                    class="dataTables_scrollFoot"
                                    style="
                                        overflow: hidden;
                                        border: 0px;
                                        width: 100%;
                                    "
                                >
                                    <div
                                        class="dataTables_scrollFootInner"
                                        style="
                                            width: 466px;
                                            padding-right: 17px;
                                        "
                                    >
                                        <table
                                            class="display dataTable"
                                            style="
                                                width: 466px;
                                                margin-left: 0px;
                                            "
                                        >
                                            <tfoot>
                                                <tr>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 184.922px"
                                                    >
                                                        Club
                                                    </th>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 72.6562px"
                                                    >
                                                        W
                                                    </th>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 65.6875px"
                                                    >
                                                        D
                                                    </th>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 62.7344px"
                                                    >
                                                        L
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="dataTables_info"
                                id="seri1_info"
                                role="status"
                                aria-live="polite"
                            >
                                Showing 1 to 5 of 5 entries
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="table-div-left mt-4">
                        <h4 class="text-left">Serie A</h4>

                        <div id="seri2_wrapper" class="dataTables_wrapper">
                            <div class="dataTables_scroll">
                                <div
                                    class="dataTables_scrollHead"
                                    style="
                                        overflow: hidden;
                                        position: relative;
                                        border: 0px;
                                        width: 100%;
                                    "
                                >
                                    <div
                                        class="dataTables_scrollHeadInner"
                                        style="
                                            box-sizing: content-box;
                                            width: 690px;
                                            padding-right: 17px;
                                        "
                                    >
                                        <table
                                            class="display dataTable"
                                            style="
                                                width: 690px;
                                                margin-left: 0px;
                                            "
                                        >
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="sorting sorting_asc"
                                                        tabindex="0"
                                                        aria-controls="seri2"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 134.734px"
                                                        aria-sort="ascending"
                                                        aria-label="Date: activate to sort column descending"
                                                    >
                                                        Date
                                                    </th>
                                                    <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="seri2"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 187.609px"
                                                        aria-label="Event: activate to sort column ascending"
                                                    >
                                                        Event
                                                    </th>
                                                    <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="seri2"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 89.8594px"
                                                        aria-label="Time: activate to sort column ascending"
                                                    >
                                                        Time
                                                    </th>
                                                    <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="seri2"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 133.797px"
                                                        aria-label="Venue: activate to sort column ascending"
                                                    >
                                                        Venue
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div
                                    class="dataTables_scrollBody"
                                    style="
                                        position: relative;
                                        overflow: auto;
                                        max-height: 200px;
                                        width: 100%;
                                    "
                                >
                                    <table
                                        id="seri2"
                                        class="display dataTable"
                                        style="width: 100%"
                                        aria-describedby="seri2_info"
                                        ref="table1"
                                    >
                                        <thead>
                                            <tr style="height: 0px">
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri2"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 134.734px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Date
                                                    </div>
                                                </th>
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri2"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 187.609px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Event
                                                    </div>
                                                </th>
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri2"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 89.8594px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Time
                                                    </div>
                                                </th>
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri2"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 133.797px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Venue
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="height: 0px">
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 150.734px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Date
                                                    </div>
                                                </th>
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 203.609px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Event
                                                    </div>
                                                </th>
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 105.859px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Time
                                                    </div>
                                                </th>
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 149.797px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Venue
                                                    </div>
                                                </th>
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                            <tr class="odd">
                                                <td class="sorting_1">
                                                    Nov 10, 2024
                                                </td>
                                                <td>
                                                    Royal FC
                                                    <span>vs</span>
                                                    GS FC
                                                </td>
                                                <td>12:00</td>
                                                <td>GST Stadium</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="sorting_1">
                                                    Nov 11, 2024
                                                </td>
                                                <td>
                                                    Royal FC
                                                    <span>vs</span>
                                                    GS FC
                                                </td>
                                                <td>14:00</td>
                                                <td>GST Stadium</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="sorting_1">
                                                    Nov 12, 2024
                                                </td>
                                                <td>
                                                    Royal FC
                                                    <span>vs</span>
                                                    GS FC
                                                </td>
                                                <td>14:30</td>
                                                <td>GST Stadium</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="sorting_1">
                                                    Nov 14, 2024
                                                </td>
                                                <td>
                                                    Royal FC
                                                    <span>vs</span>
                                                    GS FC
                                                </td>
                                                <td>15:30</td>
                                                <td>GST Stadium</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="sorting_1">
                                                    Nov 15, 2024
                                                </td>
                                                <td>
                                                    Royal FC
                                                    <span>vs</span>
                                                    GS FC
                                                </td>
                                                <td>19:30</td>
                                                <td>GST Stadium</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="sorting_1">
                                                    Nov 15, 2024
                                                </td>
                                                <td>
                                                    Royal FC
                                                    <span>vs</span>
                                                    GS FC
                                                </td>
                                                <td>19:30</td>
                                                <td>GST Stadium</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div
                                    class="dataTables_scrollFoot"
                                    style="
                                        overflow: hidden;
                                        border: 0px;
                                        width: 100%;
                                    "
                                >
                                    <div
                                        class="dataTables_scrollFootInner"
                                        style="
                                            width: 690px;
                                            padding-right: 17px;
                                        "
                                    >
                                        <table
                                            class="display dataTable"
                                            style="
                                                width: 690px;
                                                margin-left: 0px;
                                            "
                                        >
                                            <tfoot>
                                                <tr>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 150.734px"
                                                    >
                                                        Date
                                                    </th>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 203.609px"
                                                    >
                                                        Event
                                                    </th>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 105.859px"
                                                    >
                                                        Time
                                                    </th>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 149.797px"
                                                    >
                                                        Venue
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="dataTables_info"
                                id="seri2_info"
                                role="status"
                                aria-live="polite"
                            >
                                Showing 1 to 6 of 6 entries
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="table-ag-div py-5">
        <div class="container">
            <h2 class="comon-heading m-0 text-left">
                Tabla de posiciones &amp; Calendario
            </h2>

            <div class="row g-lg-5">
                <div class="col-lg-5">
                    <div class="table-div-left mt-4">
                        <h4 class="text-left">Serie A</h4>

                        <div id="seri1_wrapper" class="dataTables_wrapper">
                            <div class="dataTables_scroll">
                                <div
                                    class="dataTables_scrollHead"
                                    style="
                                        overflow: hidden;
                                        position: relative;
                                        border: 0px;
                                        width: 100%;
                                    "
                                >
                                    <div
                                        class="dataTables_scrollHeadInner"
                                        style="
                                            box-sizing: content-box;
                                            width: 466px;
                                            padding-right: 17px;
                                        "
                                    >
                                        <table
                                            class="display dataTable"
                                            style="
                                                width: 466px;
                                                margin-left: 0px;
                                            "
                                        >
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="sorting sorting_asc"
                                                        tabindex="0"
                                                        aria-controls="seri1"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 168.922px"
                                                        aria-sort="ascending"
                                                        aria-label="Club: activate to sort column descending"
                                                    >
                                                        Club
                                                    </th>
                                                    <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="seri1"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 56.6562px"
                                                        aria-label="W: activate to sort column ascending"
                                                    >
                                                        W
                                                    </th>
                                                    <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="seri1"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 49.6875px"
                                                        aria-label="D: activate to sort column ascending"
                                                    >
                                                        D
                                                    </th>
                                                    <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="seri1"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 46.7344px"
                                                        aria-label="L: activate to sort column ascending"
                                                    >
                                                        L
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div
                                    class="dataTables_scrollBody"
                                    style="
                                        position: relative;
                                        overflow: auto;
                                        max-height: 200px;
                                        width: 100%;
                                    "
                                >
                                    <table
                                        id="seri1"
                                        class="display dataTable"
                                        style="width: 100%"
                                        aria-describedby="seri1_info"
                                    >
                                        <thead>
                                            <tr style="height: 0px">
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 168.922px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Club
                                                    </div>
                                                </th>
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 56.6562px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        W
                                                    </div>
                                                </th>
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 49.6875px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        D
                                                    </div>
                                                </th>
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 46.7344px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        L
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="height: 0px">
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 184.922px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Club
                                                    </div>
                                                </th>
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 72.6562px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        W
                                                    </div>
                                                </th>
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 65.6875px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        D
                                                    </div>
                                                </th>
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 62.7344px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        L
                                                    </div>
                                                </th>
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                            <tr class="odd">
                                                <td class="sorting_1">
                                                    <div class="comon-ft-cl">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="fbn"
                                                                class="img-tabla-posiciones"
                                                            />
                                                            <figcaption>
                                                                Escobedo
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                </td>
                                                <td>13</td>
                                                <td>01</td>
                                                <td>61</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="sorting_1">
                                                    <div class="comon-ft-cl">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="fbn"
                                                                class="img-tabla-posiciones"
                                                            />
                                                            <figcaption>
                                                                Escobedo
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                </td>
                                                <td>12</td>
                                                <td>20</td>
                                                <td>61</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="sorting_1">
                                                    <div class="comon-ft-cl">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="fbn"
                                                                class="img-tabla-posiciones"
                                                            />
                                                            <figcaption>
                                                                Escobedo
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                </td>
                                                <td>25</td>
                                                <td>36</td>
                                                <td>61</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="sorting_1">
                                                    <div class="comon-ft-cl">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="fbn"
                                                                class="img-tabla-posiciones"
                                                            />
                                                            <figcaption>
                                                                Escobedo
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                </td>
                                                <td>25</td>
                                                <td>36</td>
                                                <td>61</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="sorting_1">
                                                    <div class="comon-ft-cl">
                                                        <figure
                                                            class="d-flex align-items-center"
                                                        >
                                                            <img
                                                                :src="
                                                                    escobedo_logo
                                                                "
                                                                alt="fbn"
                                                                class="img-tabla-posiciones"
                                                            />
                                                            <figcaption>
                                                                Escobedo
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                </td>
                                                <td>12</td>
                                                <td>36</td>
                                                <td>61</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div
                                    class="dataTables_scrollFoot"
                                    style="
                                        overflow: hidden;
                                        border: 0px;
                                        width: 100%;
                                    "
                                >
                                    <div
                                        class="dataTables_scrollFootInner"
                                        style="
                                            width: 466px;
                                            padding-right: 17px;
                                        "
                                    >
                                        <table
                                            class="display dataTable"
                                            style="
                                                width: 466px;
                                                margin-left: 0px;
                                            "
                                        >
                                            <tfoot>
                                                <tr>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 184.922px"
                                                    >
                                                        Club
                                                    </th>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 72.6562px"
                                                    >
                                                        W
                                                    </th>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 65.6875px"
                                                    >
                                                        D
                                                    </th>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 62.7344px"
                                                    >
                                                        L
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="dataTables_info"
                                id="seri1_info"
                                role="status"
                                aria-live="polite"
                            >
                                Showing 1 to 5 of 5 entries
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="table-div-left mt-4">
                        <h4 class="text-left">Serie A</h4>

                        <div id="seri2_wrapper" class="dataTables_wrapper">
                            <div class="dataTables_scroll">
                                <div
                                    class="dataTables_scrollHead"
                                    style="
                                        overflow: hidden;
                                        position: relative;
                                        border: 0px;
                                        width: 100%;
                                    "
                                >
                                    <div
                                        class="dataTables_scrollHeadInner"
                                        style="
                                            box-sizing: content-box;
                                            width: 690px;
                                            padding-right: 17px;
                                        "
                                    >
                                        <table
                                            class="display dataTable"
                                            style="
                                                width: 690px;
                                                margin-left: 0px;
                                            "
                                        >
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="sorting sorting_asc"
                                                        tabindex="0"
                                                        aria-controls="seri2"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 134.734px"
                                                        aria-sort="ascending"
                                                        aria-label="Date: activate to sort column descending"
                                                    >
                                                        Date
                                                    </th>
                                                    <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="seri2"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 187.609px"
                                                        aria-label="Event: activate to sort column ascending"
                                                    >
                                                        Event
                                                    </th>
                                                    <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="seri2"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 89.8594px"
                                                        aria-label="Time: activate to sort column ascending"
                                                    >
                                                        Time
                                                    </th>
                                                    <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="seri2"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 133.797px"
                                                        aria-label="Venue: activate to sort column ascending"
                                                    >
                                                        Venue
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div
                                    class="dataTables_scrollBody"
                                    style="
                                        position: relative;
                                        overflow: auto;
                                        max-height: 200px;
                                        width: 100%;
                                    "
                                >
                                    <table
                                        id="seri2"
                                        class="display dataTable"
                                        style="width: 100%"
                                        aria-describedby="seri2_info"
                                        ref="table1"
                                    >
                                        <thead>
                                            <tr style="height: 0px">
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri2"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 134.734px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Date
                                                    </div>
                                                </th>
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri2"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 187.609px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Event
                                                    </div>
                                                </th>
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri2"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 89.8594px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Time
                                                    </div>
                                                </th>
                                                <th
                                                    class="sorting"
                                                    aria-controls="seri2"
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        width: 133.797px;
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Venue
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="height: 0px">
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 150.734px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Date
                                                    </div>
                                                </th>
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 203.609px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Event
                                                    </div>
                                                </th>
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 105.859px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Time
                                                    </div>
                                                </th>
                                                <th
                                                    rowspan="1"
                                                    colspan="1"
                                                    style="
                                                        padding-top: 0px;
                                                        padding-bottom: 0px;
                                                        border-top-width: 0px;
                                                        border-bottom-width: 0px;
                                                        height: 0px;
                                                        width: 149.797px;
                                                    "
                                                >
                                                    <div
                                                        class="dataTables_sizing"
                                                        style="
                                                            height: 0px;
                                                            overflow: hidden;
                                                        "
                                                    >
                                                        Venue
                                                    </div>
                                                </th>
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                            <tr class="odd">
                                                <td class="sorting_1">
                                                    Nov 10, 2024
                                                </td>
                                                <td>
                                                    Royal FC
                                                    <span>vs</span>
                                                    GS FC
                                                </td>
                                                <td>12:00</td>
                                                <td>GST Stadium</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="sorting_1">
                                                    Nov 11, 2024
                                                </td>
                                                <td>
                                                    Royal FC
                                                    <span>vs</span>
                                                    GS FC
                                                </td>
                                                <td>14:00</td>
                                                <td>GST Stadium</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="sorting_1">
                                                    Nov 12, 2024
                                                </td>
                                                <td>
                                                    Royal FC
                                                    <span>vs</span>
                                                    GS FC
                                                </td>
                                                <td>14:30</td>
                                                <td>GST Stadium</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="sorting_1">
                                                    Nov 14, 2024
                                                </td>
                                                <td>
                                                    Royal FC
                                                    <span>vs</span>
                                                    GS FC
                                                </td>
                                                <td>15:30</td>
                                                <td>GST Stadium</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="sorting_1">
                                                    Nov 15, 2024
                                                </td>
                                                <td>
                                                    Royal FC
                                                    <span>vs</span>
                                                    GS FC
                                                </td>
                                                <td>19:30</td>
                                                <td>GST Stadium</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="sorting_1">
                                                    Nov 15, 2024
                                                </td>
                                                <td>
                                                    Royal FC
                                                    <span>vs</span>
                                                    GS FC
                                                </td>
                                                <td>19:30</td>
                                                <td>GST Stadium</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div
                                    class="dataTables_scrollFoot"
                                    style="
                                        overflow: hidden;
                                        border: 0px;
                                        width: 100%;
                                    "
                                >
                                    <div
                                        class="dataTables_scrollFootInner"
                                        style="
                                            width: 690px;
                                            padding-right: 17px;
                                        "
                                    >
                                        <table
                                            class="display dataTable"
                                            style="
                                                width: 690px;
                                                margin-left: 0px;
                                            "
                                        >
                                            <tfoot>
                                                <tr>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 150.734px"
                                                    >
                                                        Date
                                                    </th>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 203.609px"
                                                    >
                                                        Event
                                                    </th>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 105.859px"
                                                    >
                                                        Time
                                                    </th>
                                                    <th
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 149.797px"
                                                    >
                                                        Venue
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="dataTables_info"
                                id="seri2_info"
                                role="status"
                                aria-live="polite"
                            >
                                Showing 1 to 6 of 6 entries
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import escobedo_logo from "@images/logo-escobedo.png";

</script>

<style scoped>
.container-home .container {
    max-width: 1250px;
}
/* TABLA DE POSICIONES & CALENDARIO */
.table-ag-div {
    display: inline-block;
    width: 100%;
}

.comon-heading {
    font-weight: 600;
    color: #071f40;
    font-size: 35px;
}

.table-div-left h4 {
    background: #ee1d36;
    padding: 8px 10px 8px 20px;
    color: #fff;
}

.table-div-left td {
    font-size: 14px;
}

.img-tabla-posiciones {
    width: 31px;
    height: 40px;
    object-fit: cover;
}

/* Para navegadores basados en WebKit (Chrome, Safari) */
.dataTables_scrollBody::-webkit-scrollbar {
    width: 8px; /* Ancho de la barra de scroll */
}

.dataTables_scrollBody::-webkit-scrollbar-thumb {
    background-color: black;
    border-radius: 10px;
}

.dataTables_scrollBody::-webkit-scrollbar-track {
    background-color: #f1f1f1;
    border-radius: 10px;
}

/* Para Firefox */
.dataTables_scrollBody {
    scrollbar-color: var(--red) #f1f1f1;
    scrollbar-width: thin;
}
</style>
