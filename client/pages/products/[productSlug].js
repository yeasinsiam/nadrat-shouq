import { apiGetProduct } from "@/api/products";
import React, { useEffect, useRef, useState } from "react";
import { AiFillStar } from "react-icons/ai";
import parse from "html-react-parser";
import InnerImageZoom from "react-inner-image-zoom";

import "react-inner-image-zoom/lib/InnerImageZoom/styles.css";
import { MdKeyboardArrowLeft, MdKeyboardArrowRight } from "react-icons/md";
import Head from "next/head";
import apiGetContactInfo from "@/api/contact-info";

export async function getServerSideProps(ctx) {
  const { productSlug } = ctx.query;

  return {
    props: {
      product: await apiGetProduct(productSlug),
      fallback: {
        "/contact-info": await apiGetContactInfo(),
      },
    },
  };
}

const SingleProduct = ({ product }) => {
  return (
    <>
      <Head>
        <title>{product.name} - Nadrat Shouq Est</title>
      </Head>

      <section
        className="
    sm:cs-container !max-w-6xl  sm:px-9 "
      >
        {/*  Mobile Images */}
        <MobileImages
          gallery={product.gallery}
          wrapperClassNames="relative block sm:hidden"
        />

        <div className="px-6 gap-5 sm:grid sm:grid-cols-1 sm:pt-6 lg:grid-cols-2">
          {/* Desktop Images */}
          <div>
            <DesktopGallery
              gallery={product.gallery}
              wrapperClassNames="block max-lg:hidden"
            />
          </div>
          <div>
            {/* Title Area */}
            <div className=" mt-5 space-y-1 mb-5  sm:px-0 sm:mt-0 sm:row-start-1 sm:row-end-2 ">
              <h1 className="font-bold text-2xl sm:text-3xl hover:underline hover:decoration-2 ">
                {product.name}
              </h1>
              {/* <div className="flex flex-col gap-1 lg:flex-row">
              <em className="text-sm text-zinc-600 inline-flex items-center hover:underline hover:decoration-1">
                <AiFillStar />
                {product.fabric}
              </em>
              <em className="text-sm text-zinc-600 inline-flex items-center hover:underline hover:decoration-1">
                <AiFillStar />
                {product.material}
              </em>
              <em className="text-sm text-zinc-600 inline-flex items-center hover:underline hover:decoration-1">
                <AiFillStar />
                {product.measurement}
              </em>
            </div> */}
              <div className=" mt-5  sm:px-0">
                <div className="flex flex-col  text-sm text-zinc-500">
                  <p>
                    Fabric:{" "}
                    <strong className="text-md text-zinc-600">
                      {product.fabric}
                    </strong>
                  </p>
                  <p>
                    Material:{" "}
                    <strong className="text-md text-zinc-600">
                      {product.material}
                    </strong>
                  </p>
                  <p>
                    Measurement:{" "}
                    <strong className="text-md text-zinc-600">
                      {product.measurement}
                    </strong>
                  </p>
                  <p>
                    Warranty:{" "}
                    <strong className="text-md text-zinc-600">
                      {product.warranty}
                    </strong>
                  </p>
                </div>
              </div>
            </div>
            {/* Description */}
            <div className=" mt-5 space-y-2 sm:px-0">
              <h4 className="font-bold text-zinc-700 text-xl underline decoration-2">
                About this product
              </h4>

              <div
                className="single-product-description text-zinc-500 whitespace-break-spaces"
                dangerouslySetInnerHTML={{ __html: product.description }}
              ></div>
            </div>
          </div>
        </div>
        <div className="py-10"></div>
      </section>
    </>
  );
};

export default SingleProduct;

const MobileImages = ({ gallery, wrapperClassNames }) => {
  const swiperModalImagesElRef = useRef();
  const [activeSlideNumber, setActiveSlideNumber] = useState(1);

  // Init product mobile images swiper
  useEffect(() => {
    const swiperMobileImagesEl = swiperModalImagesElRef.current;

    const handleSlideChange = (e) => {
      setActiveSlideNumber(e.activeIndex + 1);
    };

    Object.assign(swiperMobileImagesEl, {
      slidesPerView: 1,
      grabCursor: true,
      pagination: {
        dynamicBullets: true,
      },
      on: {
        slideChange: handleSlideChange,
      },
    });
    swiperMobileImagesEl.initialize();
  }, []);

  return (
    <div className={wrapperClassNames}>
      <swiper-container ref={swiperModalImagesElRef} init="false">
        {gallery.map((image, index) => (
          <swiper-slide key={image.id}>
            <div className="relative">
              <img
                alt={image.name}
                src={image.original_url}
                data-srcset={image.responsive_images_srcset}
                className="lazyload object-cover w-full aspect-square"
              />
            </div>
          </swiper-slide>
        ))}
      </swiper-container>
      {/* Remaining text */}
      {gallery.length !== activeSlideNumber ? (
        <div className="absolute z-10 bottom-3 right-3  px-3  bg-black/50 rounded-md">
          <span className="text-xs font-bold text-white select-none">
            {activeSlideNumber}
            <span className="mx-[2px]">/</span>
            {gallery.length}
          </span>
        </div>
      ) : null}
    </div>
  );
};
const DesktopGallery = ({ gallery, wrapperClassNames }) => {
  const swiperModalImagesElRef = useRef();
  const swiperModalMiniImagesElRef = useRef();
  const [activeSlideNumber, setActiveSlideNumber] = useState(1);

  // Init product mobile images swiper
  useEffect(() => {
    const swiperMobileImagesEl = swiperModalImagesElRef.current;

    const handleSlideChange = (e) => {
      setActiveSlideNumber(e.activeIndex + 1);
    };

    Object.assign(swiperMobileImagesEl, {
      slidesPerView: 1,
      grabCursor: true,

      pagination: {
        dynamicBullets: true,
      },
      navigation: {
        nextEl: ".product-desktop-image-swiper-button-next",
        prevEl: ".product-desktop-image-swiper-button-prev",
      },
      on: {
        slideChange: handleSlideChange,
      },
    });
    swiperMobileImagesEl.initialize();
  }, []);
  useEffect(() => {
    const swiperModalMiniImagesElRefEl = swiperModalMiniImagesElRef.current;

    const handleSlideChange = (e) => {
      setActiveSlideNumber(e.activeIndex + 1);
    };

    Object.assign(swiperModalMiniImagesElRefEl, {
      slidesPerView: 4,
      spaceBetween: 7,
      grabCursor: true,
      freeMode: true,
      navigation: {
        nextEl: ".product-desktop-mini-image-swiper-button-next",
        prevEl: ".product-desktop-mini-image-swiper-button-prev",
      },
      on: {
        slideChange: handleSlideChange,
      },
    });
    swiperModalMiniImagesElRefEl.initialize();
  }, []);

  return (
    <div className={wrapperClassNames}>
      <div className="relative rounded-lg overflow-hidden">
        <swiper-container
          ref={swiperModalImagesElRef}
          init="false"
          thumbs-swiper="#mini-product-slider"
        >
          {gallery.map((image, index) => (
            <swiper-slide key={image.id}>
              <div className="relative">
                {/* <img
                  alt={image.name}
                  src={image.original_url}
                  data-srcset={image.responsive_images_srcset}
                  className="lazyload h-[430px] object-cover w-full aspect-square "
                /> */}
                <InnerImageZoom
                  src={image.original_url}
                  srcSet={image.responsive_images_srcset}
                  imgAttributes={{
                    srcSet: image.responsive_images_srcset,
                    className: "h-[435px] object-cover w-full aspect-square",
                  }}
                  className="!block h-full"
                  // zoomType="hover"
                />
              </div>
            </swiper-slide>
          ))}
        </swiper-container>
        {/* Remaining text */}
        <div className="absolute z-10 bottom-3 left-3  px-3  bg-black/50 rounded-md">
          <span className="text-xs font-bold text-white select-none">
            {activeSlideNumber}
            <span className="mx-[2px]">/</span>
            {gallery.length}
          </span>
        </div>

        <div className="product-desktop-image-swiper-button-prev flex items-center justify-center w-5 h-5  border-2 border-zinc-700 absolute top-2/4 left-3 -mt-3 z-10 bg-white rounded-full duration-200 hover:shadow-[0_6px_16px_rgba(0,0,0,0.24);]  hover:scale-105 sm:w-7 sm:h-7  aria-disabled:hidden hover:bg-zinc-700">
          <MdKeyboardArrowLeft className="block text-3xl duration-500 hover:text-white" />
        </div>
        <div className="product-desktop-image-swiper-button-next flex items-center justify-center w-5 h-5 border-2 border-zinc-700 absolute top-2/4 right-3 -mt-3 z-10 bg-white rounded-full duration-200 hover:shadow-[0_6px_16px_rgba(0,0,0,0.24);]  hover:scale-105 sm:w-7 sm:h-7 aria-disabled:hidden hover:bg-zinc-700">
          <MdKeyboardArrowRight className="block text-3xl duration-500 hover:text-white" />
        </div>
      </div>
      <div className="mt-4 relative">
        <swiper-container
          ref={swiperModalMiniImagesElRef}
          init="false"
          id="mini-product-slider"
        >
          {gallery.map((image, index) => (
            <swiper-slide key={image.id}>
              <div className="relative p-1">
                <img
                  alt={image.name}
                  src={image.original_url}
                  data-srcset={image.responsive_images_srcset}
                  className="lazyload   w-full object-cover  aspect-square rounded"
                />
              </div>
            </swiper-slide>
          ))}
        </swiper-container>
        <div className="product-desktop-mini-image-swiper-button-prev flex items-center justify-center w-5 h-5  border-2 border-zinc-700 absolute top-2/4 left-2 -mt-3 z-10 bg-white rounded-full duration-200 hover:shadow-[0_6px_16px_rgba(0,0,0,0.24);]  hover:scale-105 sm:w-6 sm:h-6  aria-disabled:hidden hover:bg-zinc-700">
          <MdKeyboardArrowLeft className="block text-3xl duration-500 hover:text-white" />
        </div>
        <div className="product-desktop-mini-image-swiper-button-next flex items-center justify-center w-5 h-5 border-2 border-zinc-700 absolute top-2/4 right-2 -mt-3 z-10 bg-white rounded-full duration-200 hover:shadow-[0_6px_16px_rgba(0,0,0,0.24);]  hover:scale-105 sm:w-6 sm:h-6 aria-disabled:hidden hover:bg-zinc-700">
          <MdKeyboardArrowRight className="block text-3xl duration-500 hover:text-white" />
        </div>
      </div>
    </div>
  );
};
