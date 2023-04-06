@extends('frontend.layouts.master')

@section('content')



<section class="bleesed default">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-12 mb-4 mt-5">
                <h3 class="fw-bold darkerGrotesque-bold txt-primary mb-3">Your all Donation Record</h3>
                <div class="table-responsive fs-5 shadow-sm  ">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"> Next payment</th>
                                <th scope="col">Frequincy</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Fund</th>
                                <th scope="col">Sub Fund</th>
                                <th scope="col"> payment method</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12-12-2023</td>
                                <td>weekly</td>
                                <td>$56</td>
                                <td>fund purpose</td>
                                <td>youth</td>
                                <td>card or something</td>
                                <td class="d-flex align-items-center">
                                    <a href="user-donation-edit.html" class="px-2">
                                        <iconify-icon class="txt-primary" icon="mdi:pencil-outline"></iconify-icon>
                                    </a>
                                    <a href="#" class="px-2">
                                        <iconify-icon class="text-danger" icon="bi:trash"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>12-12-2023</td>
                                <td>weekly</td>
                                <td>$56</td>
                                <td>fund purpose</td>
                                <td>youth</td>
                                <td>card or something</td>
                                <td class="d-flex align-items-center">
                                    <a href="user-donation-edit.html" class="px-2">
                                        <iconify-icon class="txt-primary" icon="mdi:pencil-outline"></iconify-icon>
                                    </a>
                                    <a href="#" class="px-2">
                                        <iconify-icon class="text-danger" icon="bi:trash"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>12-12-2023</td>
                                <td>weekly</td>
                                <td>$56</td>
                                <td>fund purpose</td>
                                <td>youth</td>
                                <td>card or something</td>
                                <td class="d-flex align-items-center">
                                    <a href="user-donation-edit.html" class="px-2">
                                        <iconify-icon class="txt-primary" icon="mdi:pencil-outline"></iconify-icon>
                                    </a>
                                    <a href="#" class="px-2">
                                        <iconify-icon class="text-danger" icon="bi:trash"></iconify-icon>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
