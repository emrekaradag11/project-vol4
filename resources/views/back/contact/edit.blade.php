@extends("back.layout")
@section("content")
    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card-header">
                        <h4 class="card-title d-flex justify-content-between align-items-center">{{$contact->title}} Düzenle<a class="btn btn-success btn-sm" href="contact">Geri Dön</a></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form row" method="post" enctype="multipart/form-data" action="contact/{{$contact->id}}">
                                <div class="col-12">
                                    @csrf
                                    @method("PUT")
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="title">Başlık</label>
                                                <input type="text" value="{{$contact->title}}" id="title" class="form-control" name="title">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="phone">Telefon</label>
                                                <input type="text" value="{{$contact->phone}}" id="phone" class="form-control" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="fax">Faks</label>
                                                <input type="text" value="{{$contact->fax}}" id="fax" class="form-control" name="fax">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="mail">E-Posta</label>
                                                <input type="text" value="{{$contact->mail}}" id="mail" class="form-control" name="mail">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="map">Harita</label>
                                                <textarea class="form-control" name="map" id="map" cols="10" rows="4">{{$contact->map}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-actions col-12 text-right">
                                            <input type="hidden" name="id" value="{{$contact->id}}">
                                            <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                                <i class="fa fa-check-square-o"></i> Kaydet
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

