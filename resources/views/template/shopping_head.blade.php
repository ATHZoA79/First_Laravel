<h2 class="mt-3 text-2xl font-bold">購物車</h2>
<div class="progress mt-3 w-full py-2 flex justify-center ">
  <div class="step w-2/12 flex flex-col items-center">
    <div class="w-12 h-12 rounded-full flex justify-center items-center bg-red-900
    @if ($step == 1) outline outline-slate-300 @endif 
    @if($step>1) bg-red-700 @endif">1</div>
    <p class="text-center pt-2">確認購物車</p>
  </div>
  <div class="w-1/12 h-1 mt-6 border-2 
  @if($step>1)border-red-700 @else border-red-900 @endif  rounded-full"></div>
  <div class="step w-3/12 flex flex-col items-center">
    <div class="w-12 h-12 rounded-full flex justify-center items-center bg-red-900
    @if ($step == 2) outline outline-slate-300 @endif
    @if($step>2) bg-red-700 @endif">2</div>
    <p class="text-center pt-2">付款及運輸方式</p>
  </div>
  <div class="w-1/12 h-1 mt-6 border-2 
  @if($step>2)border-red-700 @else border-red-900 @endif rounded-full"></div>
  <div class="step w-3/12 flex flex-col items-center">
    <div class="w-12 h-12 rounded-full flex justify-center items-center bg-red-900
    @if ($step == 3) outline outline-slate-300 @endif
    @if($step>3) bg-red-700 @endif">3</div>
    <p class="text-center pt-2">填寫寄件資料</p>
  </div>
  <div class="w-1/12 h-1 mt-6 border-2 
  @if($step>3)border-red-700 @else border-red-900 @endif rounded-full"></div>
  <div class="step w-2/12 flex flex-col items-center">
    <div class="w-12 h-12 rounded-full flex justify-center items-center bg-red-900
    @if ($step == 4) outline outline-slate-300 @endif">4</div>
    <p class="text-center pt-2">完成</p>
  </div>
</div>
<hr class="my-3 border-slate-300">