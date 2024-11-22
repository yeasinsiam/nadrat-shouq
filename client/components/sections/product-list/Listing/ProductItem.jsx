import Link from "next/link";
import { useRef, useEffect, useState } from "react";
import { AiFillStar } from "react-icons/ai";
import { LiaDotCircle } from "react-icons/lia";
import { PiDotOutlineBold } from "react-icons/pi";
import { GoDotFill } from "react-icons/go";
import { MdKeyboardArrowLeft, MdKeyboardArrowRight } from "react-icons/md";

export default function ProductItem({ product }) {
  return (
    <Link href={`/products/${product.meta_slug}`} className="group block">
      <article className="relative">
        <div
          aria-hidden={false}
          className=" space-y-2 block transition-opacity duration-700  aria-hidden:opacity-0 aria-hidden:absolute aria-hidden:top-0 aria-hidden:-z-10"
        >
          <MobileImages product={product} />

          <div className="group space-y-1">
            <h2 className="block text-[18px] font-bold group-hover:underline group-hover:decoration-2 ">
              {product.name}
            </h2>
            <div className="flex   text-sm text-zinc-500  flex-wrap  gap-x-2">
              <p>
                Fabric:{" "}
                <strong className="text-md text-zinc-600 whitespace-nowrap">
                  {product.fabric}
                </strong>
              </p>
              <p>
                Material:{" "}
                <strong className="text-md text-zinc-600 whitespace-nowrap">
                  {product.material}
                </strong>
              </p>
              <p>
                Measurement:{" "}
                <strong className="text-md text-zinc-600 whitespace-nowrap">
                  {product.measurement}
                </strong>
              </p>
              <p>
                Warranty:{" "}
                <strong className="text-md text-zinc-600 whitespace-nowrap">
                  {product.warranty}
                </strong>
              </p>
            </div>
            {/* <div className="flex  gap-x-2  flex-wrap">
              <em className="text-sm whitespace-nowrap text-zinc-600 inline-flex items-center hover:underline hover:decoration-1">
                <GoDotFill />
                {product.fabric}
              </em>
              <em className="text-sm whitespace-nowrap text-zinc-600 inline-flex items-center hover:underline hover:decoration-1">
                <GoDotFill />
                {product.material}
              </em>
              <em className="text-sm whitespace-nowrap text-zinc-600 inline-flex items-center hover:underline hover:decoration-1">
                <GoDotFill />
                {product.measurement}
              </em>
              <em className="text-sm whitespace-nowrap text-zinc-600 inline-flex items-center hover:underline hover:decoration-1">
                <GoDotFill />
                {product.warranty}
              </em>
            </div> */}
            {/* <em className="block text-base text-zinc-600 ">{product.fabric}</em>
            <em className="block text-base text-zinc-600">
              {product.material}
            </em>
            <em className="block text-base text-zinc-600">
              {product.measurement}
            </em> */}
          </div>
        </div>
      </article>
    </Link>
  );
}

const MobileImages = ({ product }) => {
  const swiperElRef = useRef();
  // const [imagesLoaded, setImagesLoaded] = useState(false);

  const nextElClass = `prod-img-${product.meta_slug}-swiper-button-next`;
  const prevElClass = `prod-img-${product.meta_slug}-swiper-button-prev`;

  // Init product mobile images swiper
  // useEffect(() => {
  //   if (swiperElRef.current) {
  //     const swiperEl = swiperElRef.current;

  //     const handleAfterInit = () => {
  //       setImagesLoaded(true);
  //     };

  //     Object.assign(swiperEl, {
  //       slidesPerView: 1,
  //       grabCursor: true,
  //       pagination: {
  //         dynamicBullets: true,
  //       },
  //       mousewheel: {
  //         forceToAxis: true,
  //         thresholdDelta: 40,
  //       },
  //       navigation: {
  //         nextEl: `[data-target="${nextElClass}"`,
  //         prevEl: `[data-target="${prevElClass}"`,
  //       },
  //       on: {
  //         afterInit: handleAfterInit,
  //       },
  //     });
  //     swiperEl.initialize();

  //     return () => {
  //       swiperEl.swiper.off("afterInit", handleAfterInit);
  //     };
  //   }
  // }, [swiperElRef]);

  return (
    <>
      {/* <div
        aria-hidden={!imagesLoaded}
        className="w-full h-52 bg-slate-400 rounded-md animate-pulse aria-hidden:hidden"
      ></div> */}

      <div
        aria-hidden={false}
        // aria-hidden={!imagesLoaded}
        className="group block relative rounded-lg overflow-hidden 
        transition-opacity duration-500 opacity-100 aria-hidden:opacity-0 aria-hidden:absolute aria-hidden:-z-[999]"
      >
        <swiper-container
          ref={swiperElRef}
          // init="false"
          slides-per-view="1"
          navigation-prev-el={`[data-target="${prevElClass}"`}
          navigation-next-el={`[data-target="${nextElClass}"`}
          mousewheel-force-to-axis="true"
          mousewheel-threshold-delta="40"
          grab-cursor="true"
          pagination-dynamic-bullets="true"
        >
          {product.gallery.map((image) => (
            <swiper-slide key={image.id}>
              <img
                alt={image.name}
                src={image.original_url}
                data-srcset={image.responsive_images_srcset}
                className="lazyload object-cover w-full aspect-[16/14]"
              />
            </swiper-slide>
          ))}
        </swiper-container>
        <div
          data-target={prevElClass}
          className="opacity-0 sm:group-hover:opacity-100 flex items-center justify-center w-8 h-8  border-2 border-zinc-700 absolute top-2/4 left-3 -mt-3 z-10 bg-white rounded-full duration-500 hover:shadow-[0_6px_16px_rgba(0,0,0,0.24);]  hover:scale-105 focus:shadow-[0_6px_16px_rgba(0,0,0,0.24);] focus:hover:scale-105 sm:w-6 sm:h-6 hover:bg-zinc-700 aria-disabled:!opacity-0"
        >
          <MdKeyboardArrowLeft className="block text-3xl duration-500 hover:text-white" />
        </div>
        <div
          data-target={nextElClass}
          className="opacity-0 sm:group-hover:opacity-100 flex items-center justify-center w-8 h-8 border-2 border-zinc-700 absolute top-2/4 right-3 -mt-3 z-10 bg-white rounded-full duration-500  hover:shadow-[0_6px_16px_rgba(0,0,0,0.24);]  hover:scale-105 focus:shadow-[0_6px_16px_rgba(0,0,0,0.24);] focus:hover:scale-105 sm:w-6 sm:h-6  hover:bg-zinc-700 aria-disabled:!opacity-0"
        >
          <MdKeyboardArrowRight className="block text-3xl duration-500 hover:text-white" />
        </div>
      </div>
    </>
  );
};

export const ProductItemLoadingPlaceholder = (props) => (
  <article className="relative" {...props}>
    <div className="block space-y-2 animate-pulse aria-hidden:hidden">
      <div className="w-full h-80  bg-slate-400 rounded-md "></div>
      <div className="space-y-2">
        <div className="w-full h-4 bg-slate-400 rounded-md "></div>
        <div className="w-48 h-2 bg-slate-400 rounded-md"></div>
        <div className="w-36 h-2 bg-slate-400 rounded-md "></div>
        <div className="w-32 h-2 bg-slate-400 rounded-md "></div>
      </div>
    </div>
  </article>
);
