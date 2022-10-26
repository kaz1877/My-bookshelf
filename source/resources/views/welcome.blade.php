@extends('layouts.base')


@section("main")

@include('layouts.nav')

<div class="py-4" style="background:url('storage/images/bookShelf.jpg') center no-repeat; background-size: cover;">
	<div class="container py-4">
        <div class="row">
            <div class="col-8" style="background:rgba(255,255,255,0.6);">
                <h2 class="d-none d-xl-block d-xl-none px-2 pt-4 pb-2 mt-3 text-shadow">
                    <p class="pt-4 mb-1">良い本は私の人生におけるイベントである。</p>
                </h2>
                <h3 class="d-none d-lg-block d-xl-none px-2 pt-4 pb-2 mt-3 text-shadow">
                    <p>良い本は私の人生におけるイベントである。</p>
                </h3>
                <h5 class="d-none d-md-block d-lg-none pt-4 text-shadow">
                    <p>良い本は私の人生におけるイベントである。</p>
                </h5>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
<!-- <div class="cover-text text-center">
						<h1 style="color: #fff;">My Bookshelfとは</h1>
						<p style="color: #fff;">
							自分の持っている本やお気に入りの本をウェブ上の本棚に作成し、<br/>
							読書の記録を行うことができます。
						</p>
					</div>
				</div>
			</div>
		</div> -->

@endsection
