<div class="form-check form-switch form-group">
    {{-- <label class="form-label">Status</label> --}}
    <input class="form-check-input statuscheck"  type="checkbox" role="switch" name="status" value="1" {{old('checked')==1 ? 'checked' : '' }}  id="adminUserStatus" data-id="{{$row->id}}" {{isCheckedOrNot($row->status)}} />
</div>
