import { useRouter } from "next/router";
import React, { useEffect, useMemo, useRef, useState } from "react";
import { LiaTimesSolid } from "react-icons/lia";
import { MdKeyboardArrowLeft, MdKeyboardArrowRight } from "react-icons/md";
import useSWRImmutable from "swr/immutable";

const CategoryList = ({ selectedCategorySlug, setSelectedCategorySlug }) => {
  const swiperElRef = useRef(null);
  const router = useRouter();
  const activeCategory = "";

  const { data: productCategories } = useSWRImmutable("/product-categories");

  const selectedCategoryName = useMemo(() => {
    const index = productCategories.findIndex(
      (productCategory) => productCategory.slug == selectedCategorySlug
    );

    return index != -1 ? productCategories[index].name : "";
  }, [selectedCategorySlug]);

  const setProductCategory = (productCategorySlug) => {
    router.push(
      productCategorySlug ? `/?category=${productCategorySlug}` : "/",
      undefined,
      {
        shallow: true,
      }
    );
  };

  const filteredProductCategories = useMemo(
    () =>
      productCategories.filter(
        (productCategory) => productCategory.products_count
      ),
    [productCategories]
  );

  // useInitCategorySwiper(swiperElRef, filteredProductCategories.length);

  useEffect(() => {
    setSelectedCategorySlug(router.query.category ?? "");
  }, [router.query]);

  const initialSelectedCategorySlugIndex = useMemo(
    () =>
      productCategories.findIndex(
        (category) => category.slug == router.query.category
      ),
    [router.query]
  );

  return (
    <div className="sticky z-40 top-[72px] bg-white  pt-0 mb-5 sm:top-[88px] [box-shadow:_0_4px_6px_-3px_theme('colors.zinc.200');]">
      {Boolean(selectedCategorySlug) && (
        <div className="flex items-center justify-center w-full h-8 text-sm border-b">
          Category: <em className="font-bold ml-1">{selectedCategoryName}</em>
          <div className="ml-2 w-[50px]  ">
            <button
              type="button"
              onClick={() => {
                setProductCategory("");
                window.scrollTo(0, 0);
              }}
              className="group relative block w-4 h-4 border-2 border-zinc-500 rounded-3xl overflow-hidden transition-[width] duration-500 hover:w-[47px]  hover:shadow-[0_6px_16px_rgba(0,0,0,0.10);] hover:bg-zinc-900"
            >
              <LiaTimesSolid className="text-[9px] stroke-2 absolute top-[15%] left-[2px] group-hover:text-zinc-200" />
              <span className="block text-[10px] ml-[1px] font-bold absolute top-[-4px] left-[11px] opacity-1 duration-500 group-hover:opacity-100  group-hover:text-zinc-200">
                Reset
              </span>
            </button>
          </div>
        </div>
      )}

      <div className="relative cs-container  md:pt-2">
        <div
          className="max-w-md mx-auto px-4 pt-1 relative transition-opacity duration-1000  opacity-100  
          sm:max-w-lg"
        >
          <swiper-container
            ref={swiperElRef}
            // init="false"
            initial-slide={initialSelectedCategorySlugIndex}
            slides-per-view={
              filteredProductCategories.length < 5
                ? filteredProductCategories.length
                : 4
            }
            navigation-prev-el=".cat-swiper-button-prev"
            navigation-next-el=".cat-swiper-button-next"
            mousewheel-force-to-axis="true"
            mousewheel-threshold-delta="40"
            free-mode="true"
          >
            {filteredProductCategories.map((productCategory) => (
              <swiper-slide key={productCategory.slug}>
                <button
                  onClick={() => {
                    setProductCategory(productCategory.slug);
                    window.scrollTo(0, 0);
                  }}
                  aria-current={productCategory.slug === selectedCategorySlug}
                  className="group w-full h-full py-2 flex flex-col justify-center items-center transition-colors  duration-500 cursor-pointer border-b-[3px] border-transparent hover:border-zinc-400 aria-[current='true']:border-zinc-900"
                >
                  <img
                    src={productCategory.icon.original_url}
                    alt="sofa"
                    className="w-7 h-7 sm:w-8 sm:h-8  duration-300 group-hover:scale-125  group-aria-[current='true']:scale-125 "
                  />
                  <span className="block text-base sm:text-md text-center text-zinc-700 font-semibold duration-500 group-hover:font-bold group-hover:translate-y-1 group-aria-[current='true']:translate-y-1 group-aria-[current='true']:font-bold">
                    {productCategory.name}
                  </span>
                </button>
              </swiper-slide>
            ))}
          </swiper-container>
          <div className="cat-swiper-button-prev flex items-center justify-center w-5 h-5  border-2 border-zinc-700 absolute top-2/4 left-0 -mt-3 z-10 bg-white rounded-full duration-200 hover:shadow-[0_6px_16px_rgba(0,0,0,0.24);]  hover:scale-105 sm:w-6 sm:h-6  aria-disabled:hidden hover:bg-zinc-700">
            <MdKeyboardArrowLeft className="block text-3xl duration-500 hover:text-white" />
          </div>
          <div className="cat-swiper-button-next flex items-center justify-center w-5 h-5 border-2 border-zinc-700 absolute top-2/4 right-0 -mt-3 z-10 bg-white rounded-full duration-200 hover:shadow-[0_6px_16px_rgba(0,0,0,0.24);]  hover:scale-105 sm:w-6 sm:h-6 aria-disabled:hidden hover:bg-zinc-700">
            <MdKeyboardArrowRight className="block text-3xl duration-500 hover:text-white" />
          </div>
        </div>
      </div>
    </div>
  );
};

// const useInitCategorySwiper = (
//   swiperElRef,
//   filteredProductCategoriesLength
// ) => {
//   // Init category select list
//   useEffect(() => {
//     if (swiperElRef.current) {
//       const swiperEl = swiperElRef.current;

//       Object.assign(swiperEl, {
//         activeIndex: 4,
//         slidesPerView:
//           filteredProductCategoriesLength < 5
//             ? filteredProductCategoriesLength
//             : 4,
//         mousewheel: {
//           forceToAxis: true,
//           thresholdDelta: 40,
//         },
//         freeMode: true,
//         navigation: {
//           nextEl: ".cat-swiper-button-next",
//           prevEl: ".cat-swiper-button-prev",
//         },
//         breakpoints: {
//           0: {
//             // slidesPerView: 4,
//             spaceBetween: 0,
//           },
//           768: {
//             // slidesPerView: 4,
//             spaceBetween: 0,
//           },
//         },
//       });
//       swiperEl.initialize();
//     }
//   }, []);
// };

export default CategoryList;
